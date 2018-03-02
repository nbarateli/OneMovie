<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Genre;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function findByGenre($genre_name, $page = 1)
    {
        $genre = (new Genre())->all();

        return view('genre', ['genre' => $genre]);
    }

    public function findById($id = 1)
    {

        return Cast::find(1)->role(1) . " $id ara yle";
    }
}
