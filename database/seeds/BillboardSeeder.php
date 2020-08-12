<?php

use Illuminate\Database\Seeder;

class BillboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billboard = new App\Billboard();
        $billboard->date_now = now();
        $billboard->show_date = now();
        $billboard->status = true;
        $billboard->capacity = 30;
        $billboard->movie_id = 1;
        $billboard->location_id = 1;
        $billboard->save();
    }
}
