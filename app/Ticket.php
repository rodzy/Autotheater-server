<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function billboards()
    {
        return $this->belongsToMany('App\Billboard');
    }
}
