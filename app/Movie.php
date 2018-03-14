<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
    public function genres() {
        return $this->belongsToMany('App\Genre', 'genre_to_movie');
    }

    public function cast() {
        return $this->belongsToMany('App\Cast', 'roles', 'cast_id', 'movie_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'movie_id', 'id')->orderBy('created_at', 'desc');
    }
}
