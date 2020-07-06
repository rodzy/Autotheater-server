<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function classificationproducts()
    {
        return $this->belongsToMany('App\ClassificationProduct');
    }

    public function producttype()
    {
        return $this->belongsTo('App\ProductType');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
