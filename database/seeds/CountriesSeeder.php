<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $countries = fopen("resources/countries.txt", 'r');
        for ($line = fgets($countries); $line; $line = fgets($countries)) {
            DB::table('countries')->insert(['country_name' => str_replace("\n", '', $line)]);
        }
    }
}
