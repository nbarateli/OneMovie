<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    public function get_rating() {

        $ratings = (new Rating())->where('movie_id', $this->id)->get();

        return $this->average($ratings, 'rating_value');
    }

    private function average($array) {
        $sum = 0.0;
        foreach ($array as $rating) {
            $sum += $rating->rating_value;
        }
        $count = count($array);

        return $count == 0 ? 0 : $sum / $count;
    }
}
