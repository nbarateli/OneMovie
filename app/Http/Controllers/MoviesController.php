<?php

namespace App\Http\Controllers;

use App\Country;
use App\Genre;
use App\Movie;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

function in_range($val, $start, $end) {
    return floatval($start) <= floatval($val) && floatval($val) <= floatval($end);
}

function addRoutes($movies) {
    foreach ($movies as $movie) {
        $movie->route = route('movie', ['id' => $movie->id]);
        $movie->rate_route = route('rate_movie', ['id' => $movie->id]);
    }
}

class MoviesController extends Controller {
    const MOVIES_PER_PAGE = 24;


    public function allMovies($page = 1) {

        return $this->movies_view(Movie::orderBy('created_at', 'desc')->get(),
            null, 'All movies', $page, 'all_movies', []);
    }

    private function movies_view($movies, $genre, $term, $page, $route_name, $data) {

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
                'pages' => $pages,
                'route_name' => $route_name,
                'data' => $data
            ]);
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

    public function findByGenre($genre_name, $page = 1) {
        $genre = (new Genre())->findByName($genre_name) ? (new Genre())->findByName($genre_name) : Genre::find(1);

        $movies = $genre->movies()->orderBy('id')->get();

        return $this->movies_view($movies, $genre->genre_name, null, $page, 'genre', ['genre_name' => $genre_name]);
    }

    public function findById($id = 1) {
        $movie = Movie::find($id);

        return view('movie', ['movie' => $movie, $related = []]);
    }

    public function searchMovies(Request $request, $page = 1) {

        if ($request->input('title') == null) {
            return $request->input('json_response') ? json_encode([]) : redirect(route('all_movies'));
        }
        $movies = Movie::whereRaw('lower(title) like \'%' .
            strtolower($request->input('title')) . '%\'')->get();
        if (count($movies) == 0) {
            return $request->input('json_response') ? json_encode([]) : redirect(route('all_movies'));
        }
        if ($request->input('raw_routes') != null && $request->input('raw_routes'))
            addRoutes($movies);
        if ($request->input('json_response')) return json_encode($movies);
        return $this->movies_view($movies, null,
            'Looking for "' . $request->input('title') . '"', $page, 'search_movies',
            $request->all());
    }

    public function all_countries() {
        $countries = [];

        foreach (Country::all() as $country) {
            array_push($countries, $country->country_name);
        }
        return response(json_encode($countries))->header('Content-Type', 'Application/Json');
    }

    public function allGenres() {
        $genres = [];

        foreach (Genre::all() as $genre) {
            array_push($genres, $genre->genre_name);
        }
        return response(json_encode($genres))->header('Content-Type', 'Application/Json');
    }

    public function get_ratings_of($movie_id) {
        $movie = Movie::find($movie_id);

        return response(json_encode(
            [
                'rating' => number_format($movie->get_rating(), 2)
            ]))->header('Content-Type', 'Application/Json');
    }

    public function rate_movie(Request $request, $id) {

        $result = ['success' => false];
        $input = $request->all();
        $input['id'] = $id;
        $input['auth'] = Auth::check();
        $validator = Validator::make($input,
            [
                'id' => 'required|exists:movies,id',
                'auth' => 'required|accepted',
                'rating' => 'required|integer|min:1|max:5'
            ]
        );

        if ($validator->passes()) {
            $result['success'] = true;
            $rating = $this->get_rating(Auth::id(), $id);
            $rating->rating_value = $request->input('rating');
            $rating->save();
        }
        $result['error'] = $validator->errors();
        return response()->json($result);
    }

    private function get_rating($user_id, $movie_id) {
        $rating = Rating::whereRaw("user_id = $user_id AND movie_id = $movie_id")->first();
        if ($rating == null) {
            $rating = new Rating();
            $rating->user_id = $user_id;
            $rating->movie_id = $movie_id;
        }
        return $rating;
    }


}
