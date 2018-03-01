<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    public function role($movie_id)
    {
        $this->hasMany('App\Role')->where('movie_id', $movie_id);

    }

    public function getMovies()
    {
        return $this->hasMany('App\Role')->get();
    }

}
