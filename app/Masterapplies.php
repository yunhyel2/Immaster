<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterapplies extends Model
{
    public function categories() {
        return $this->hasMany('App\Applycategory');
    }

    public function locations() {
        return $this->hasMany('App\Applylocation');
    }

    public function dates() {
        return $this->hasMany('App\Applydate');
    }
}
