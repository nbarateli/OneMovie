<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    public function Author() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function movie() {
        return $this->belongsTo('App\Movie', 'movie_id');
    }
}
