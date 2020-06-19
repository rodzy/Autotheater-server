<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function billboard()
    {
        return $this->belongsTo('App\Billboard');
    }
}
