<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Lunar\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        Currency::firstOrCreate([
            'code' => 'COP',
        ], [
            'name' => 'Peso Colombiano',
            'exchange_rate' => 1,
            'decimal_places' => 0,
            'default' => true,
            'enabled' => true,
        ]);
    }
}
