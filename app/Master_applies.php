<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_applies extends Model
{
    protected $table = 'master_applies';

    public function categories() {
        return $this->hasMany('App\Master_applycategory');
    }

    public function locations() {
        return $this->hasMany('App\Master_applylocation');
    }

    public function dates() {
        return $this->hasMany('App\Master_applydate');
    }

    public function images() {
        return $this->hasMany('App\Master_applyimages');
    }
}
