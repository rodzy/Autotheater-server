<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producttype=new App\ProductType();
        $producttype->name='Pop corn';
        $producttype->description='Pop corn their flavors might vary';
        $producttype->save();

        $producttype=new App\ProductType();
        $producttype->name='Drinks';
        $producttype->description='Soda drinks and shakes';
        $producttype->save();

        $producttype=new App\ProductType();
        $producttype->name='Snacks';
        $producttype->description='From sweets to even hot dogs and nachos';
        $producttype->save();
    }
}
