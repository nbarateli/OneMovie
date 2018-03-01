<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function movie()

    {
        return $this->belongsTo('App\Movie', 'movie_id');

    }
}
