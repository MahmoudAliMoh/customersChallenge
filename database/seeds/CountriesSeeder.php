<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedCountries();
    }

    /**
     * Seed countries in countries table.
     *
     * @return void
     */
    public function seedCountries()
    {
        $countries = [
            [
                'name' => 'Cameroon',
                'code' => '237',
                'regex' => '\(237\)\ ?[2368]\d{7,8}$',
            ],
            [
                'name' => 'Ethiopia',
                'code' => '251',
                'regex' => '\(251\)\ ?[1-59]\d{8}$',
            ],
            [
                'name' => 'Morocco',
                'code' => '212',
                'regex' => '\(212\)\ ?[5-9]\d{8}$',
            ],
            [
                'name' => 'Mozambique',
                'code' => '258',
                'regex' => '\(258\)\ ?[28]\d{7,8}$',
            ],
            [
                'name' => 'Uganda',
                'code' => '256',
                'regex' => '\(256\)\ ?\d{9}$',
            ],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate($country);
        }
    }
}
