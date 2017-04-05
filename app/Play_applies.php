<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play_applies extends Model
{
    protected $table = 'play_applies';

    public function user() {
        return $this->belongsTo('App\Server_userprofile');
    }

    public function images() {
        return $this->hasMany('App\Play_applyimages');
    }

    public function schedules() {
        return $this->hasMany('App\Play_applyschedule');
    }
}
