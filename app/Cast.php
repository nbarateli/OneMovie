<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    public function role($movie_id)
    {
        return $this->hasMany('App\Role')->where('movie_id', $movie_id)->first();


    }

    public function movies()
    {
        return $this->belongsToMany('App\Movie', 'roles', 'movie_id', 'cast_id');
    }

}
