<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array('code' => 'SY', 'name' => 'Syria'),
            array('code' => 'IQ', 'name' => 'Iraq'),
        );

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['code' => $country['code']],
                ['name' => $country['name'], 'code' => $country['code']]
            );
        }
    }
}