<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket=new App\Ticket();
        $ticket->name='Car first row';
        $ticket->description='Ticket for a normal vehicle with a spot on the front row';
        $ticket->pricing=40;
        $ticket->active=true;
        $ticket->save();

        $ticket=new App\Ticket();
        $ticket->name='Car middle row';
        $ticket->description='Ticket for a normal vehicle with a spot on the middle row';
        $ticket->pricing=20;
        $ticket->active=true;
        $ticket->save();

        $ticket=new App\Ticket();
        $ticket->name='Car last row';
        $ticket->description='Ticket for a normal vehicle with a spot on the last row';
        $ticket->pricing=10;
        $ticket->active=true;
        $ticket->save();

        $ticket=new App\Ticket();
        $ticket->name='Motorbike group row';
        $ticket->description='Motorbike for a normal motobike with a spot on the group row';
        $ticket->pricing=10;
        $ticket->active=true;
        $ticket->save();

    }
}
