<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function movies()

    {
        return Movie::find($this->movie_id);
    }
}
