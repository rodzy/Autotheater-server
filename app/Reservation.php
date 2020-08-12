<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }
    public function tickets()
    {
        return $this->belongsToMany('App\Ticket');
    }
    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
}
