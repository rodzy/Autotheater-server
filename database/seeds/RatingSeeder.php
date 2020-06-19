<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rating=new App\Rating();
        $rating->product_id=1;
        $rating->save();
    }
}
