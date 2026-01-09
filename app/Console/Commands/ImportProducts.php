<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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

class ImportProducts extends Command
{
    protected $signature = 'products:import';
    protected $description = 'Importar productos desde products.json';

    public function handle()
    {
        $this->info('Importando productos...');
        
        $jsonPath = database_path('seeders/data/products.json');
        $json = file_get_contents($jsonPath);
        $products = json_decode($json);
        
        if (!$products) {
            $this->error('Error leyendo JSON: ' . json_last_error_msg());
            return 1;
        }
        
        $this->info('Total productos: ' . count($products));
        
        $attributes = Attribute::get();
        $productType = ProductType::firstOrCreate(['name' => 'stock']);
        $taxClass = TaxClass::getDefault();
        $currency = Currency::getDefault();
        $collections = Collection::get();
        $language = Language::getDefault();
        
        $bar = $this->output->createProgressBar(count($products));
        $bar->start();
        
        foreach ($products as $product) {
            $this->createProduct($product, $attributes, $productType, $taxClass, $currency, $collections, $language);
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine();
        $this->info('✓ Productos importados exitosamente!');
        
        return 0;
    }
    
    private function createProduct($product, $attributes, $productType, $taxClass, $currency, $collections, $language)
    {
        $attributeData = [];
        foreach ($product->attributes as $attributeHandle => $value) {
            $attribute = $attributes->first(fn ($att) => $att->handle == $attributeHandle);
            if ($attribute) {
                $attributeData[$attributeHandle] = new TranslatedText(['en' => new Text($value)]);
            }
        }
        
        $brand = Brand::firstOrCreate(['name' => $product->brand]);
        
        $productModel = Product::create([
            'attribute_data' => $attributeData,
            'product_type_id' => $productType->id,
            'status' => 'published',
            'brand_id' => $brand->id,
        ]);
        
        $slug = Str::slug($product->attributes->name);
        $productModel->urls()->create([
            'slug' => $slug,
            'default' => true,
            'language_id' => $language->id,
        ]);
        
        // Crear variantes
        if (!isset($product->variants) || count($product->variants) === 0) {
            // Producto simple sin variantes
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
                'priceable_type' => ProductVariant::class,
                'priceable_id' => $variant->id,
                'price' => $product->price,
                'min_quantity' => 1,
            ]);
        } else {
            // Producto con variantes
            $options = ProductOption::get();
            $optionValues = ProductOptionValue::get();
            $optionIds = [];
            
            foreach ($product->options as $optionIndex => $option) {
                $optionModel = $options->first(fn ($opt) => $option->name == $opt->translate('name'));
                
                if (!$optionModel) {
                    $optionModel = ProductOption::create([
                        'name' => ['en' => $option->name],
                        'label' => ['en' => $option->name],
                        'shared' => true,
                        'handle' => Str::slug($option->name),
                    ]);
                    $options->push($optionModel);
                }
                
                $optionIds[$optionModel->id] = ['position' => $optionIndex + 1];
                
                foreach ($option->values as $value) {
                    $valueModel = $optionValues->first(fn ($val) => $value == $val->translate('name') && $val->product_option_id == $optionModel->id);
                    
                    if (!$valueModel) {
                        $valueModel = ProductOptionValue::create([
                            'product_option_id' => $optionModel->id,
                            'position' => $optionIndex,
                            'name' => ['en' => $value],
                        ]);
                        $optionValues->push($valueModel);
                    }
                }
            }
            
            $productModel->productOptions()->sync($optionIds);
            
            // Crear variantes del producto
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
                    'priceable_type' => ProductVariant::class,
                    'priceable_id' => $variantModel->id,
                    'price' => $variantData->price,
                    'min_quantity' => 1,
                ]);
                
                $valueIds = $optionValues->filter(function ($option) use ($variantData) {
                    return in_array($option->translate('name'), $variantData->values);
                })->pluck('id');
                
                $variantModel->values()->sync($valueIds);
            }
        }
        
        // Relacionar con colecciones
        foreach ($product->collections as $collectionName) {
            $collection = $collections->first(function ($coll) use ($collectionName) {
                return strtolower($coll->translateAttribute('name')) === strtolower($collectionName);
            });
            if ($collection) {
                $collection->products()->attach($productModel->id);
            }
        }
    }
}
