<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function reservations()
    {
        return $this->belongsToMany('App\Reservation');
    }
}
