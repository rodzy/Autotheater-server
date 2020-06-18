<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }
}
