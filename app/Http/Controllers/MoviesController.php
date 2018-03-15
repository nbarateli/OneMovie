<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Country;
use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

function in_range($val, $start, $end) {
    return floatval($start) <= floatval($val) && floatval($val) <= floatval($end);
}

class MoviesController extends Controller {
    const MOVIES_PER_PAGE = 24;

    public function allMovies($page = 1) {
        return $this->movies_view(Movie::all(), null, 'All movies', $page);
    }

    public function findByGenre($genre_name, $page = 1) {
        $genre = (new Genre())->findByName($genre_name) ? (new Genre())->findByName($genre_name) : Genre::find(1);

        $movies = $genre->movies()->orderBy('id')->get();

        return $this->movies_view($movies, $genre->genre_name, null, $page);
    }

    public function findById($id = 1) {
        $movie = Movie::find($id);

        return view('movie', ['movie' => $movie, $related = []]);
    }

    private function count_pages($movies, &$page, &$next_page, &$prev_page) {
        $n_pages = count($movies) / self::MOVIES_PER_PAGE + 1;
        if (count($movies) % self::MOVIES_PER_PAGE == 0 && $n_pages != 0)
            $n_pages--;

        if (!in_range($page, 1, $n_pages)) $page = 1;

        $next_page = $page < $n_pages ? $page + 1 : -1;
        $prev_page = $page > 1 ? $page - 1 : 1;
        return $n_pages;
    }

    private function get_movies_on_page($movies, $page) {
        $movies_on_page = [];
        $p = $page - 1;
        $next_page = ($p + 1) * self::MOVIES_PER_PAGE;
        for ($i = $p * self::MOVIES_PER_PAGE; $i < $next_page &&
        $i < count($movies); $i++)
            $movies_on_page[$i % self::MOVIES_PER_PAGE] = $movies[$i];

        return $movies_on_page;
    }

    private function get_pages($page, $n_pages) {
        $pages = [];
        $start_page = $page - 2 < 1 ? 1 : $page - 2;
        $end_page = $start_page + 4 > $n_pages ? $n_pages : $start_page + 4;
        for ($i = $start_page; $i <= $end_page; $i++) array_push($pages, $i);
        return $pages;
    }

    public function all_countries() {
        $countries = [];

        foreach (Country::all() as $country) {
            array_push($countries, $country->country_name);
        }
        return response(json_encode($countries))->header('Content-Type', 'Application/Json');
    }

    private function movies_view($movies, $genre, $term, $page) {

        $next_page = $prev_page = -1;
        $n_pages = $this->count_pages($movies, $page, $next_page, $prev_page);
        $movies_on_page = $this->get_movies_on_page($movies, $page);
        $pages = $this->get_pages($page, $n_pages);
        return view('movies',
            [
                'movies' => $movies_on_page,
                'page' => $page,
                'prev_page' => $prev_page,
                'next_page' => $next_page,
                'term' => $term,
                'genre' => $genre,
                'pages' => $pages
            ]);
    }

    public function allGenres() {
        $genres = [];

        foreach (Genre::all() as $genre) {
            array_push($genres, $genre->genre_name);
        }
        return response(json_encode($genres))->header('Content-Type', 'Application/Json');
    }
}
