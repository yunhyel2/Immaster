<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_applies extends Model
{
    protected $table = 'master_applies';

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
