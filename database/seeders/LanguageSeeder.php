<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Lunar\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run()
    {
       \Lunar\Models\Language::firstOrCreate([
        'code' => 'es',
        ], [
        'name' => 'Español',
        'default' => true,
        // 'enabled' => true, 
        ]);
    }
}
