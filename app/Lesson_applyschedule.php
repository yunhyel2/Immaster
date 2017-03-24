<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_applyschedule extends Model
{
    public function apply() {
        return $this->belongsTo('App\Lesson_applies');
    }
}
