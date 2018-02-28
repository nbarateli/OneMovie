<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function findByGenre($genre)
    {
        return "$genre ara yle";
    }

    public function findById($id = 1)
    {
        $cast = new Cast();

        return $cast->find(1)->role(1) . "$id ara yle";
    }
}
