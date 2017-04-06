<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play_applyimages extends Model
{
    protected $table = 'play_applyimages';
    public function apply() {
        return $this->belongsTo('App\Play_applies');
    }
}
