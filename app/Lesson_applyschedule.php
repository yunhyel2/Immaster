<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_applyschedule extends Model
{
    protected $table = 'lesson_applyschedule';
    public function apply() {
        return $this->belongsTo('App\Lesson_applies');
    }
}
