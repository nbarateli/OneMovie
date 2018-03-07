<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    public function getByName($name) {
        return $this->where('country_name', $name)->first();
    }

    public function movies() {
        return $this->hasMany('App\Movie');
    }
}
