<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applycategory extends Model
{
    public function master_apply() {
        return $this->belongsTo('App\Masterapplies');
    }
}
