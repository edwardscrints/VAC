<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Lunar\Models\Country;
use Lunar\Models\TaxClass;
use Lunar\Models\TaxRate;
use Lunar\Models\TaxZone;
use Lunar\Models\TaxZoneCountry;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $taxClass = TaxClass::first();
        if (!$taxClass) {
            $taxClass = TaxClass::create([
                'name' => 'General',
                'default' => true,
            ]);
        }

        // Crear o buscar el país Colombia
        $colombia = Country::firstOrCreate(
            [
                'iso3' => 'COL',
            ],
            [
                'name' => 'Colombia',
                'iso2' => 'CO',
                'phonecode' => '+57',
                'capital' => 'Bogotá',
                'currency' => 'COP',
                'native' => 'Colombia',
                'emoji' => '🇨🇴',
                'emoji_u' => 'U+1F1E8 U+1F1F4',
            ]
        );

        $colombiaTaxZone = TaxZone::factory()->create([
            'name' => 'Colombia',
            'active' => true,
            'default' => true,
            'zone_type' => 'country',
        ]);

        TaxZoneCountry::factory()->create([
            'country_id' => $colombia->id,
            'tax_zone_id' => $colombiaTaxZone->id,
        ]);

        $colombiaRate = TaxRate::factory()->create([
            'name' => 'IVA',
            'tax_zone_id' => $colombiaTaxZone->id,
            'priority' => 1,
        ]);

        $colombiaRate->taxRateAmounts()->createMany([
            [
                'percentage' => 19,
                'tax_class_id' => $taxClass->id,
            ],
        ]);
    }
}
