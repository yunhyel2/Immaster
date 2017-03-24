<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play_applyschedule extends Model
{
    protected $table = 'play_applyschedule';
    public function apply() {
        return $this->belongsTo('App\Play_applies');
    }
}
