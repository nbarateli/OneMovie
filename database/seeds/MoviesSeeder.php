<?php

use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->insertMovies();

        DB::table('roles')->insert(['role_name' => 'Crew', 'movie_id' => 1, 'cast_id' => 1]);
        for ($mo = 1; $mo <= 30; $mo++) {
            DB::table('genre_to_movie')
                ->insert(['genre_id' => 1, 'movie_id' => $mo]);
            DB::table('genre_to_movie')
                ->insert(['genre_id' => 2, 'movie_id' => $mo]);
        }
    }

    private function insertMovies() {
        $movies = json_decode(file_get_contents('resources/database_seeder_extra/movies.json'));

        foreach ($movies as $movie) {
            DB::table('movies')->insert([
                'title' => $movie->title,
                'year' => $movie->year,
                'poster' => $movie->poster,
                'description' => $movie->description,
                'trailer' => $movie->trailer,
                'country_id' => $movie->country_id
            ]);
        }
    }
}
