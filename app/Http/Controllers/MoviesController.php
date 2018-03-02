<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Genre;
use Illuminate\Http\Request;

function in_range($val, $start, $end)
{
    return floatval($start) <= floatval($val) && floatval($val) <= floatval($end);
}

class MoviesController extends Controller
{
    const MOVIES_PER_PAGE = 14;

    public function findByGenre($genre_name, $page = 1)
    {
        $genre = (new Genre())->findByName($genre_name) ? (new Genre())->findByName($genre_name) : Genre::find(1);

        $movies = $genre->movies()->orderBy('id')->get();

        $next_page = $prev_page = -1;
        $this->count_pages($movies, $page, $next_page, $prev_page);
        $movies_on_page = $this->get_movies_on_page($movies, $page);

        return view('movies',
            [
                'movies' => $movies_on_page,
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

    private function count_pages($movies, &$page, &$next_page, &$prev_page)
    {
        $n_pages = count($movies) / self::MOVIES_PER_PAGE + 1;
        if (count($movies) % self::MOVIES_PER_PAGE == 0 && $n_pages != 0)
            $n_pages--;

        if (!in_range($page, 1, $n_pages)) $page = 1;

        $next_page = $page < $n_pages ? $page + 1 : -1;
        $prev_page = $page > 1 ? $page - 1 : 1;
    }

    private function get_movies_on_page($movies, $page)
    {
        $movies_on_page = [];
        $p = $page - 1;
        $next_page = ($p + 1) * self::MOVIES_PER_PAGE;
        for ($i = $p * self::MOVIES_PER_PAGE; $i < $next_page &&
        $i < count($movies); $i++)
            $movies_on_page[$i % self::MOVIES_PER_PAGE] = $movies[$i];

        return $movies_on_page;
    }
}
