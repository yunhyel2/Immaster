<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_applies extends Model
{
    protected $table = 'lesson_applies';

    public function user() {
        return $this->belongsTo('App\Server_userprofile');
    }

    public function images() {
        return $this->hasMany('App\Lesson_applyimages');
    }

    public function schedules() {
        return $this->hasMany('App\Lesson_applyschedule');
    }
}
