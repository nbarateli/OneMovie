<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie', 'genre_to_movie');
    }

    public function findByName($name)
    {
        return $this->where('genre_name', $name)->first();
    }
}
