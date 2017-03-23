<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_applyimages extends Model
{
    public function user() {
        return $this->belongsTo('App\Lesson_applies');
    }
}
