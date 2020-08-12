<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billboard extends Model
{
    public function locations()
    {
        return $this->hasMany('App\Location');
    }
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}
