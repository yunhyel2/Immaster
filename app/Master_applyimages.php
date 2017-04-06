<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_applyimages extends Model
{
    protected $table = 'master_applyimages';
    public function apply() {
        return $this->belongsTo('App\Master_applies');
    }
}
