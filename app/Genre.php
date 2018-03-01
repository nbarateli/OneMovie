<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }

    public function findByName($name)
    {
        return $this->where('genre_name', $name)->first();
    }
}
