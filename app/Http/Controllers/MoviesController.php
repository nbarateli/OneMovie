<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Genre;
use function App\in_range;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    const MOVIES_PER_PAGE = 14;

    public function findByGenre($genre_name, $page = 1)
    {
        $genre = (new Genre())->findByName($genre_name) ? (new Genre())->findByName($genre_name) : Genre::find(1);

        $movies = $genre->movies;
        $n_pages = count($movies) / self::MOVIES_PER_PAGE + 1;
        if (count($movies) % self::MOVIES_PER_PAGE == 0 && $n_pages != 0)
            $n_pages--;
        if (in_range($page, 1, $n_pages)) ;
        $next_page = $prev_page = -1;
        return view('movies',
            [
                'movies' => $movies,
                'page' => $page,
                'prev_page' => $prev_page,
                'next_page' => $next_page,
                'term' => null,
                'genre' => $genre->genre_name
            ]);
    }

    public function findById($id = 1)
    {

        return Cast::find(1)->role(1) . " $id ara yle";
    }
}
