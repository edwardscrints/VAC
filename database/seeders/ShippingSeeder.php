<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Lunar\Models\Country;
use Lunar\Models\Currency;
use Lunar\Models\Price;
use Lunar\Shipping\Models\ShippingMethod;
use Lunar\Shipping\Models\ShippingRate;
use Lunar\Shipping\Models\ShippingZone;
use Lunar\Shipping\Models\ShippingZonePostcode;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency = Currency::getDefault();

        $colombiaShipping = ShippingMethod::create([
            'name' => 'Envío Nacional',
            'code' => 'COL',
            'enabled' => true,
            'driver' => 'ship-by',
            'data' => [
                'charge_by' => 'cart_total',
            ]
        ]);

        $colombiaShippingZone = ShippingZone::create([
            'name' => 'Colombia',
            'type' => 'countries',
        ]);

        $colombiaShippingRate = ShippingRate::create([
            'shipping_zone_id' => $colombiaShippingZone->id,
            'shipping_method_id' => $colombiaShipping->id,
            'enabled' => true,
        ]);

        $colombia = Country::where('iso3', '=', 'COL')->first();
        if ($colombia) {
            $colombiaShippingZone->countries()->sync([$colombia->id]);
        }

        Price::create([
            'priceable_type' => (new ShippingRate)->getMorphClass(),
            'priceable_id' => $colombiaShippingRate->id,
            'price' => 1000,
            'min_quantity' => 1,
            'currency_id' => $currency->id,
        ]);

        // Envío gratis en compras superiores a $100.000
        Price::create([
            'priceable_type' => (new ShippingRate)->getMorphClass(),
            'priceable_id' => $colombiaShippingRate->id,
            'price' => 0,
            'min_quantity' => 100000,
            'currency_id' => $currency->id,
        ]);

    }
}
