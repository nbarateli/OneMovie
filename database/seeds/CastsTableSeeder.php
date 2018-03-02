<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CastsTableSeeder extends Seeder
{
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


        $this->insertGenres();
        $this->insertMovies();
        DB::table('roles')->insert(['role_name' => 'Crew', 'movie_id' => 1, 'cast_id' => 1]);
        for ($i = 1; $i < 19; $i++)
            for ($mo = 1; $mo <= 30; $mo++)
                DB::table('genre_to_movie')
                    ->insert(['genre_id' => $i, 'movie_id' => $mo]);

    }

    private function insertMovies()
    {
        $movies = [
            ['title' => 'Light B/t Oceans', 'poster' => 'images/m7.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'The BFG', 'poster' => 'images/m8.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Central Intelligence', 'poster' => 'images/m9.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Don\'t Think Twice', 'poster' => 'images/m10.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'X-Men', 'poster' => 'images/m11.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Greater', 'poster' => 'images/m12.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Mike-Dave', 'poster' => 'images/c7.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Bad Moms', 'poster' => 'images/c8.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Barber Shop', 'poster' => 'images/c9.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Nine Leaves', 'poster' => 'images/c10.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Billy Lynn’s', 'poster' => 'images/c11.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'War on Everyone', 'poster' => 'images/c12.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Light B/t Oceans', 'poster' => 'images/m7.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'The BFG', 'poster' => 'images/m8.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Central Intelligence', 'poster' => 'images/m9.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Don\'t Think Twice', 'poster' => 'images/m10.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'X-Men', 'poster' => 'images/m11.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Greater', 'poster' => 'images/m12.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Nine Leaves', 'poster' => 'images/c10.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Dirty Grandpa', 'poster' => 'images/c2.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Ride Along', 'poster' => 'images/c3.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'The Boss', 'poster' => 'images/c4.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Keanu', 'poster' => 'images/c5.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Ice Age', 'poster' => 'images/c6.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Citizen Soldier', 'poster' => 'images/m13.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'X-Men', 'poster' => 'images/m11.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Greater', 'poster' => 'images/m12.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Light B/t Oceans', 'poster' => 'images/m7.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'The BFG', 'poster' => 'images/m8.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Central Intelligence', 'poster' => 'images/m9.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Don\'t Think Twice', 'poster' => 'images/m10.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'Peter', 'poster' => 'images/m17.jpg', 'year' => 2015, 'description' => ''],
            ['title' => 'God’s Compass', 'poster' => 'images/m15.jpg', 'year' => 2015, 'description' => '']
        ];
        $mo = 0;
        foreach ($movies as $movie) {
            $mo++;
            DB::table('movies')->insert([
                'title' => $movie['title'],
                'year' => $movie['year'],
                'poster' => $movie['poster'],
                'description' => $movie['description']
            ]);
        }
    }

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
}

