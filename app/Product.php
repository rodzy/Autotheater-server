<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function producttype()
    {
        return $this->belongsTo('App\ProductType');
    }

    public function classificationproducts()
    {
        return $this->belongsToMany('App\ClassificationProduct');
    }
    public function ratings()
    {
        return $this->belongsToMany('App\Rating');
    }
}
