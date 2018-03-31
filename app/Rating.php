<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {


    public function ratings_by(User $user) {
        if ($user == null) return [];
    }

    public function Author() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function movie() {
        return $this->belongsTo('App\Movie', 'movie_id');
    }
}
