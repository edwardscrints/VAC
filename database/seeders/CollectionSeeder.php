<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Lunar\FieldTypes\Text;
use Lunar\FieldTypes\TranslatedText;
use Lunar\Models\Collection;
use Lunar\Models\CollectionGroup;

class CollectionSeeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $collections = $this->getSeedData('collections');

        // Asegurarse de que exista al menos un CollectionGroup
        $collectionGroup = CollectionGroup::first();
        if (!$collectionGroup) {
            $collectionGroup = CollectionGroup::create([
                'name' => 'Default Group',
                'handle' => 'default-group',
            ]);
        }

        DB::transaction(function () use ($collections, $collectionGroup) {
            $allProducts = \Lunar\Models\Product::pluck('id')->toArray();
            foreach ($collections as $collection) {
                $created = Collection::create([
                    'collection_group_id' => $collectionGroup->id,
                    'attribute_data' => [
                        'name' => new TranslatedText([
                            'en' => new Text($collection->name),
                        ]),
                        'description' => new TranslatedText([
                            'en' => new Text($collection->description),
                        ]),
                    ],
                ]);
                // Asociar 3 productos aleatorios a cada colección si hay productos
                if (count($allProducts) > 0) {
                    $randomProducts = collect($allProducts)->shuffle()->take(3);
                    $created->products()->sync($randomProducts);
                }
            }
        });
    }
}
