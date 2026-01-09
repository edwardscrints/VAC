<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

class CreateIgoraRoyal extends Command
{
    protected $signature = 'products:create-igora';
    protected $description = 'Crear producto Schwarzkopf Igora Royal con variantes de color';

    public function handle()
    {
        $this->info('Creando Schwarzkopf Igora Royal...');
        
        $attributes = Attribute::get();
        $productType = ProductType::firstOrCreate(['name' => 'stock']);
        $taxClass = TaxClass::getDefault();
        $currency = Currency::getDefault();
        $language = Language::getDefault();
        
        // Crear atributos
        $attributeData = [];
        $attributeData['name'] = new TranslatedText(['en' => new Text('Schwarzkopf Igora Royal Tintura Permanente')]);
        $attributeData['description'] = new TranslatedText(['en' => new Text('Coloración profesional permanente con tecnología de pigmentos de alta definición. Cobertura 100% de canas, color intenso y duradero con máximo brillo. Fórmula con agentes acondicionadores que protegen el cabello durante la coloración. Contenido: 60ml.')]);
        
        // Crear marca
        $brand = Brand::firstOrCreate(['name' => 'Schwarzkopf']);
        
        // Crear producto
        $product = Product::create([
            'attribute_data' => $attributeData,
            'product_type_id' => $productType->id,
            'status' => 'published',
            'brand_id' => $brand->id,
        ]);
        
        $this->info('✓ Producto creado');
        
        // Crear URL
        $product->urls()->create([
            'slug' => 'schwarzkopf-igora-royal-tintura-permanente',
            'default' => true,
            'language_id' => $language->id,
        ]);
        
        // Crear opción "Tonalidad"
        $option = ProductOption::create([
            'name' => ['en' => 'Tonalidad'],
            'label' => ['en' => 'Tonalidad'],
            'shared' => true,
            'handle' => 'tonalidad',
        ]);
        
        $product->productOptions()->attach($option->id, ['position' => 1]);
        $this->info('✓ Opción "Tonalidad" creada');
        
        // Colores disponibles
        $colores = [
            '1-1 Azul Negro',
            '2-1 Negro Azulado',
            '3-0 Castaño Oscuro',
            '3-65 Castaño Oscuro Chocolate Oro',
            '4-0 Castaño Medio',
            '4-88 Castaño Medio Rojo Extra',
            '5-0 Castaño Claro',
            '5-65 Castaño Claro Chocolate Oro',
            '6-0 Rubio Oscuro',
            '6-77 Rubio Oscuro Cobre Extra',
            '7-0 Rubio Medio',
            '7-77 Rubio Medio Cobre Extra',
            '8-0 Rubio Claro',
            '9-0 Rubio Muy Claro',
            '9-5-18 Rubio Perla Cendre',
            '10-0 Rubio Ultra Claro',
            '12-19 Especial Rubia Cendre Violeta',
        ];
        
        $bar = $this->output->createProgressBar(count($colores));
        $bar->start();
        
        // Crear valores de opción y variantes
        foreach ($colores as $index => $color) {
            $optionValue = ProductOptionValue::create([
                'product_option_id' => $option->id,
                'position' => $index,
                'name' => ['en' => $color],
            ]);
            
            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'purchasable' => 'always',
                'shippable' => true,
                'backorder' => 0,
                'sku' => sprintf('IGR-%03d', $index + 1),
                'tax_class_id' => $taxClass->id,
                'stock' => 500,
            ]);
            
            Price::create([
                'customer_group_id' => null,
                'currency_id' => $currency->id,
                'priceable_type' => ProductVariant::class,
                'priceable_id' => $variant->id,
                'price' => 32900,
                'min_quantity' => 1,
            ]);
            
            $variant->values()->attach($optionValue->id);
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine();
        
        // Relacionar con colecciones
        $collections = ['cuidado-capilar', 'schwarzkopf', 'tinturas'];
        foreach ($collections as $collectionName) {
            $collection = Collection::whereJsonContains('attribute_data->name->en', $collectionName)->first();
            if ($collection) {
                $collection->products()->attach($product->id);
            }
        }
        
        $this->info('✓ Igora Royal creado exitosamente con ' . count($colores) . ' variantes');
        $this->info('  ID: ' . $product->id);
        $this->info('  URL: /products/schwarzkopf-igora-royal-tintura-permanente');
        
        return 0;
    }
}
