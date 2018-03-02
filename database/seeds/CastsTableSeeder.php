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
        for ($mo = 1; $mo <= 30; $mo++)
            DB::table('genre_to_movie')
                ->insert(['genre_id' => 1, 'movie_id' => $mo]);

    }

    private function insertMovies()
    {

        $movies = [
            ['title' => 'Bad Moms', 'poster' => 'images/c8.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'iKCw-kqo3cs'],
            ['title' => 'Barber Shop', 'poster' => 'images/c9.jpg', 'year' => 2015, 'description' => '', 'trailer' => 'l2vPDGStL4k'],
            ['title' => 'Billy Lynn’s Song', 'poster' => 'images/c11.jpg', 'year' => 2015, 'description' => '', 'trailer' => 'mUULFJ_I048'],
            ['title' => 'Central Intelligence', 'poster' => 'images/m9.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'MxEw3elSJ8M'],
            ['title' => 'The Avengers', 'poster' => 'images/avenge.jpg', 'year' => 2012, 'description' => '', 'trailer' => 'eOrNdBpGMv8'],
            ['title' => 'Iron Man', 'poster' => 'images/ironman.jpg', 'year' => 2008, 'description' => '', 'trailer' => '8hYlB38asDY'],
            ['title' => 'Citizen Soldier', 'poster' => 'images/m13.jpg', 'year' => 2016, 'description' => '', 'trailer' => '-d-BcfRGl7c'],
            ['title' => 'Dirty Grandpa', 'poster' => 'images/c2.jpg', 'year' => 2015, 'description' => '', 'trailer' => 'aZSzMIFZT7Q'],
            ['title' => 'The Room', 'poster' => 'images/room.jpg', 'year' => 2003, 'description' => '', 'trailer' => 'Z9cB0TjfIkM'],
            ['title' => 'The Interview', 'poster' => 'images/interview.jpg', 'year' => 2014, 'description' => '', 'trailer' => 'frsvWVEHowg'],
            ['title' => 'Don\'t Think Twice', 'poster' => 'images/m10.jpg', 'year' => 2016, 'description' => '', 'trailer' => '9RFTpObS95U'],
            ['title' => 'God’s Compass', 'poster' => 'images/m15.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'qLtD4orE2r4'],
            ['title' => '21 Jump Street', 'poster' => 'images/21jump.jpg', 'year' => 2012, 'description' => '', 'trailer' => 'RLoKtb4c4W0'],
            ['title' => '22 Jump Street', 'poster' => 'images/22jump.jpg', 'year' => 2014, 'description' => '', 'trailer' => 'qP755JkDxyM'],
            ['title' => 'Greater', 'poster' => 'images/m12.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'v0Ow6lhvPNk'],
            ['title' => 'Ice Age', 'poster' => 'images/c6.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'Ohq6NmKMja8'],
            ['title' => 'Keanu', 'poster' => 'images/c5.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'KjEusWO6VPg'],
            ['title' => 'Django Unchained', 'poster' => 'images/django_unchained.jpg', 'year' => 2012, 'description' => '', 'trailer' => 'eUdM9vrCbow'],
            ['title' => 'Hateful Eight', 'poster' => 'images/hateful_eight.jpg', 'year' => 2015, 'description' => '', 'trailer' => 'gnRbXn4-Yis'],
            ['title' => 'Guardians Of The Galaxy',
                'poster' => 'images/guardians_of_the_galaxy.jpg', 'year' => 2017, 'description' => '', 'trailer' => 'd96cjJhvlMA'],
            ['title' => 'Mike-Dave', 'poster' => 'images/c7.jpg', 'year' => 2016, 'description' => '', 'trailer' => '33MtR-g4Jcg'],
            ['title' => 'Pulp Fiction', 'poster' => 'images/pulp_fiction.jpg', 'year' => 1994, 'description' => '', 'trailer' => 's7EdQ4FqbhY'],
            ['title' => 'Nine Lives', 'poster' => 'images/c10.jpg', 'year' => 2016, 'description' => '', 'trailer' => '_jHA97HzhxE'],
            ['title' => 'Peter', 'poster' => 'images/m17.jpg', 'year' => 2016, 'description' => '', 'trailer' => '43aUvmQw55Q'],
            ['title' => 'Ride Along', 'poster' => 'images/c3.jpg', 'year' => 2016, 'description' => '', 'trailer' => '5klp6rkHIks'],
            ['title' => 'Straight Outta Compton', 'poster' => 'images/straight_outta_compton.jpg',
                'year' => 2015, 'description' => '', 'trailer' => 'rsbWEF1Sju0'],
            ['title' => 'Friday', 'poster' => 'images/friday.jpg', 'year' => 1995, 'description' => '', 'trailer' => 'nH1Ulp4PBtA'],
            ['title' => 'The BFG', 'poster' => 'images/m8.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'GZ0Bey4YUGI'],
            ['title' => 'The Boss', 'poster' => 'images/c4.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'yakeigyf0vc'],
            ['title' => 'War on Everyone', 'poster' => 'images/c12.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'XQ2L1heHHnk'],
            ['title' => 'X-Men', 'poster' => 'images/xmen.jpg', 'year' => 2000, 'description' => '', 'trailer' => 'Iy5R5_T243w'],
            ['title' => 'Logan', 'poster' => 'images/logan.jpg', 'year' => 2017, 'description' => '', 'trailer' => 'Div0iP65aZo'],
            ['title' => 'X-Men: Apocalypse', 'poster' => 'images/m11.jpg', 'year' => 2016, 'description' => '', 'trailer' => 'COvnHv42T-A'],
        ];
        $mo = 0;
        foreach ($movies as $movie) {
            $mo++;
            DB::table('movies')->insert([
                'title' => $movie['title'],
                'year' => $movie['year'],
                'poster' => $movie['poster'],
                'description' => $movie['description'],
                'trailer' => $movie['trailer']
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

