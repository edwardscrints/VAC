<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Lunar\Admin\Actions\Products\MapVariantsToProductOptions;
use Lunar\FieldTypes\ListField;
use Lunar\FieldTypes\Text;
use Lunar\FieldTypes\TranslatedText;
use Lunar\Models\Attribute;
use Lunar\Models\Brand;
use Lunar\Models\Collection;
use Lunar\Models\Currency;
use Lunar\Models\Language;
use Lunar\Models\Price;
use Lunar\Models\Product;
use Lunar\Models\ProductOption;
use Lunar\Models\ProductOptionValue;
use Lunar\Models\ProductType;
use Lunar\Models\ProductVariant;
use Lunar\Models\TaxClass;
use App\Jobs\GenerateVariants;

class ProductSeeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $products = $this->getSeedData('products');

        $attributes = Attribute::get();

        // Asegura que exista un ProductType 'stock'
        $productType = ProductType::firstOrCreate([
            'name' => 'stock',
        ]);

        $taxClass = TaxClass::getDefault();

        $currency = Currency::getDefault();

        $collections = Collection::get();

        $language = Language::getDefault();

        DB::transaction(function () use ($products, $attributes, $productType, $taxClass, $currency, $collections, $language) {
            $products->each(function ($product) use ($attributes, $productType, $taxClass, $currency, $collections, $language) {
                $attributeData = [];

                foreach ($product->attributes as $attributeHandle => $value) {
                    $attribute = $attributes->first(fn ($att) => $att->handle == $attributeHandle);

                    if ($attribute->type == TranslatedText::class) {
                        $attributeData[$attributeHandle] = new TranslatedText([
                            'en' => new Text($value),
                        ]);

                        continue;
                    }

                    if ($attribute->type == ListField::class) {
                        $attributeData[$attributeHandle] = new ListField((array) $value);
                    }
                }

                $brand = Brand::firstOrCreate([
                    'name' => $product->brand,
                ]);

                // Usar el ProductType pasado desde arriba (creado solo una vez)
                $productModel = Product::create([
                    'attribute_data' => $attributeData,
                    'product_type_id' => $productType->id,
                    'status' => 'published',
                    'brand_id' => $brand->id,
                ]);

                // Crear una URL (slug) para el producto si no existe
                $slug = Str::slug($product->attributes->name);
                $productModel->urls()->create([
                    'slug' => $slug,
                    'default' => true,
                    'language_id' => $language->id ?? 1,
                ]);

                // Si el producto NO tiene variantes, crear variante única por defecto
                if (!isset($product->variants) || count($product->variants) === 0) {
                    $variant = ProductVariant::create([
                        'product_id' => $productModel->id,
                        'purchasable' => 'always',
                        'shippable' => true,
                        'backorder' => 0,
                        'sku' => $product->sku,
                        'tax_class_id' => $taxClass->id,
                        'stock' => 500,
                    ]);

                    Price::create([
                        'customer_group_id' => null,
                        'currency_id' => $currency->id,
                        'priceable_type' => (new ProductVariant)->getMorphClass(),
                        'priceable_id' => $variant->id,
                        'price' => $product->price,
                        'min_quantity' => 1,
                    ]);
                }

                $imagePath = public_path("storage/{$product->image}");
                
                if (file_exists($imagePath)) {
                    $media = $productModel->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('images');

                    $media->setCustomProperty('primary', true);
                    $media->save();
                }

                // Relacionar el producto con las colecciones indicadas en el JSON
                foreach ($product->collections as $collectionName) {
                    $collection = $collections->first(function ($coll) use ($collectionName) {
                        return strtolower($coll->translateAttribute('name')) === strtolower($collectionName);
                    });
                    if ($collection) {
                        $collection->products()->attach($productModel->id);
                    }
                }

                // Si no tiene opciones/variantes, terminar aquí
                if (!isset($product->options) || !count($product->options ?? [])) {
                    return;
                }

                // Procesar opciones del producto (ej: Presentación, Color, etc.)
                $options = ProductOption::get();
                $optionValues = ProductOptionValue::get();

                $optionValueMapping = collect($product->options)->mapWithKeys(
                    function ($option) {
                        return [
                            $option->name => $option->values
                        ];
                    }
                )->toArray();

                $optionIds = [];

                foreach ($product->options ?? [] as $optionIndex => $option) {
                    // ¿Ya existe esta opción?
                    $optionModel = $options->first(fn ($opt) => $option->name == $opt->translate('name'));

                    if (! $optionModel) {
                        $optionModel = ProductOption::create([
                            'name' => [
                                'en' => $option->name,
                            ],
                            'label' => [
                                'en' => $option->name,
                            ],
                            'shared' => $option->shared ?? true,
                            'handle' => Str::slug($option->name),
                        ]);
                        $options->push($optionModel); // Agregar a la colección para reutilizar
                    }

                    $optionIds[$optionModel->id] = [
                        'position' => $optionIndex + 1
                    ];

                    foreach ($option->values as $value) {
                        $valueModel = $optionValues->first(fn ($val) => $value == $val->translate('name') && $val->product_option_id == $optionModel->id);

                        if (! $valueModel) {
                            $valueModel = ProductOptionValue::create([
                                'product_option_id' => $optionModel->id,
                                'position' => $optionIndex,
                                'name' => [
                                    'en' => $value,
                                ],
                            ]);
                            $optionValues->push($valueModel); // Agregar a la colección
                        }
                    }
                }

                $productModel->productOptions()->sync($optionIds);

                // Crear las variantes del producto
                foreach ($product->variants as $variantData) {
                    $variantModel = ProductVariant::create([
                        'product_id' => $productModel->id,
                        'purchasable' => 'always',
                        'shippable' => true,
                        'backorder' => 0,
                        'sku' => $variantData->sku,
                        'tax_class_id' => $taxClass->id,
                        'stock' => $variantData->stock ?? 500,
                    ]);

                    Price::create([
                        'customer_group_id' => null,
                        'currency_id' => $currency->id,
                        'priceable_type' => (new ProductVariant)->getMorphClass(),
                        'priceable_id' => $variantModel->id,
                        'price' => $variantData->price,
                        'min_quantity' => 1,
                    ]);

                    // Asociar valores de opciones a la variante (ej: "300ml", "Rojo", etc.)
                    $valueIds = $optionValues->filter(function ($option) use ($variantData) {
                        return in_array($option->translate('name'), $variantData->values);
                    })->pluck('id');

                    $variantModel->values()->sync($valueIds);
                }
            });
        });
    }
}
