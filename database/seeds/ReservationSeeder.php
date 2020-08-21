<?php

use App\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation=new App\Reservation();
        $reservation->date_now = now();
        $reservation->tax = 13;
        $reservation->total = 10000;
        $reservation->status = true;
        $reservation->billboard_id = 1;
        $reservation->user_id = 1;
        $reservation->save();
        $reservation->tickets()->attach([1,2,3,4]);
        $reservation->products()->attach([1,1,1,2]);
    }
}
