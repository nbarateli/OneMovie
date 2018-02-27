<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function findByGenre($genre)
    {
        return "$genre ara yle";
    }

    public function findById($id)
    {
        return "$id ara yle";
    }
}
