<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Lunar\Models\Address;
use Lunar\Models\Customer;

class CustomerSeeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        DB::transaction(function () {
            $faker = Factory::create();
            $customers = Customer::factory(10)->create();
            $colombia = \Lunar\Models\Country::where('iso3', 'COL')->first();
            $countryId = $colombia ? $colombia->id : 1; // Usa 1 si no existe, pero lo ideal es que exista Colombia


            foreach ($customers as $customer) {
                for ($i = 0; $i < $faker->numberBetween(1, 10); $i++) {
                    $user = User::factory()->create();

                    $customer->users()->attach($user);
                }

                $address1 = Address::factory()->create([
                    'shipping_default' => true,
                    'customer_id' => $customer->id,
                ]);
                $address1->country_id = $countryId;
                $address1->save();

                $address2 = Address::factory()->create([
                    'shipping_default' => false,
                    'customer_id' => $customer->id,
                ]);
                $address2->country_id = $countryId;
                $address2->save();

                $address3 = Address::factory()->create([
                    'shipping_default' => false,
                    'billing_default' => true,
                    'customer_id' => $customer->id,
                ]);
                $address3->country_id = $countryId;
                $address3->save();

                $address4 = Address::factory()->create([
                    'shipping_default' => false,
                    'billing_default' => false,
                    'customer_id' => $customer->id,
                ]);
                $address4->country_id = $countryId;
                $address4->save();
            }
        });
    }
}
