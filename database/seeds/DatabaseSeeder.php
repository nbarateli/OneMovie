<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(CountriesSeeder::class);
        $this->call(CastsTableSeeder::class);
        $this->call(MoviesSeeder::class);
        DB::table('users')->insert([
            'name' => 'niko',
            'email' => 'nbara15@freeuni.edu.ge',
            'password' => bcrypt('oneadmin'),
            'user_type' => 'ADMIN'
        ]);
    }
}
