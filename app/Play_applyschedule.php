<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play_applyschedule extends Model
{
    public function apply() {
        return $this->belongsTo('App\Play_applies');
    }
}
