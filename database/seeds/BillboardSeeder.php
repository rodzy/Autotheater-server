<?php

use Carbon\Carbon;
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
        $billboard->date_now = Carbon::now()->setTimezone('GMT-6');
        $billboard->show_date = Carbon::create(2020, 8, 23, 16, 30, 00, 'America/Costa_Rica');
        $billboard->status = true;
        $billboard->capacity = 30;
        $billboard->movie_id = 1;
        $billboard->location_id = 1;
        $billboard->save();
        $billboard->tickets()->attach([2,3]);
    }
}
