<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function billboard()
    {
        return $this->belongsTo('App\Billboard');
    }

    public function classification()
    {
        return $this->belongsTo('App\Classification');
    }
}
