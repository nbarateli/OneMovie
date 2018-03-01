<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CastsTableSeeder extends Seeder
{
    private function insertGenres()
    {
        $genres = ['Action',
            'Biography',
            'Crime',
            'Family',
            'Horror',
            'Romance',
            'Sports',
            'War',
            'Adventure',
            'Comedy',
            'Documentary',
            'Fantasy',
            'Thriller',
            'Animation',
            'Costume',
            'Drama',
            'History',
            'Musical',
            'Psychological'];
        foreach ($genres as $genre) {
            DB::table('genres')->insert(['genre_name' => $genre]);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('casts')->insert(
            ['first_name' => 'Nicolas',
                'last_name' => 'Cage',
                'middle_name' => '',
                'birth_date' => Carbon::parse('11-08-1995')]
        );
        DB::table('movies')->insert([
            'title' => 'Bzikebi',
            'year' => 1993,
            'description' => 'magra asw'
        ]);
        DB::table('roles')->insert(['role_name' => 'Crew', 'movie_id' => 1, 'cast_id' => 1]);
        $this->insertGenres();
    }
}

