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
            ['title' => 'Bad Moms', 'poster' => 'images/c8.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Barber Shop', 'poster' => 'images/c9.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Billy Lynn’s', 'poster' => 'images/c11.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Central Intelligence', 'poster' => 'images/m9.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'The Avengers', 'poster' => 'images/avenge.jpg', 'year' => 2012, 'description' => '', 'trailer' => ''],
            ['title' => 'Iron Man', 'poster' => 'images/ironman.jpg', 'year' => 2008, 'description' => '', 'trailer' => ''],
            ['title' => 'Citizen Soldier', 'poster' => 'images/m13.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Dirty Grandpa', 'poster' => 'images/c2.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'The Room', 'poster' => 'images/room.jpg', 'year' => 2003, 'description' => '', 'trailer' => ''],
            ['title' => 'The Interview', 'poster' => 'images/interview.jpg', 'year' => 2014, 'description' => '', 'trailer' => ''],
            ['title' => 'Don\'t Think Twice', 'poster' => 'images/m10.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'God’s Compass', 'poster' => 'images/m15.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => '21 Jump Street', 'poster' => 'images/21jump.jpg', 'year' => 2012, 'description' => '', 'trailer' => ''],
            ['title' => '22 Jump Street', 'poster' => 'images/22jump.jpg', 'year' => 2014, 'description' => '', 'trailer' => ''],
            ['title' => 'Greater', 'poster' => 'images/m12.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Ice Age', 'poster' => 'images/c6.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Keanu', 'poster' => 'images/c5.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Django Unchained', 'poster' => 'images/django_unchained.jpg', 'year' => 2012, 'description' => '', 'trailer' => ''],
            ['title' => 'Hateful Eight', 'poster' => 'images/hateful_eight.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Guardians Of The Galaxy',
                'poster' => 'images/guardians_of_the_galaxy.jpg', 'year' => 2017, 'description' => '', 'trailer' => ''],
            ['title' => 'Mike-Dave', 'poster' => 'images/c7.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Pulp Fiction', 'poster' => 'images/pulp_fiction.jpg', 'year' => 1994, 'description' => '', 'trailer' => ''],
            ['title' => 'Nine Leaves', 'poster' => 'images/c10.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Peter', 'poster' => 'images/m17.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Ride Along', 'poster' => 'images/c3.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Straight Outta Compton', 'poster' => 'images/straight_outta_compton.jpg',
                'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Friday', 'poster' => 'images/friday.jpg', 'year' => 1995, 'description' => '', 'trailer' => ''],
            ['title' => 'The BFG', 'poster' => 'images/m8.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'The Boss', 'poster' => 'images/c4.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'War on Everyone', 'poster' => 'images/c12.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'X-Men', 'poster' => 'images/m11.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'Logan', 'poster' => 'images/m11.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
            ['title' => 'X-Men', 'poster' => 'images/m11.jpg', 'year' => 2015, 'description' => '', 'trailer' => ''],
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

