<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location=new App\Location();
        $location->location='Alajuela - East';
        $location->description='300mts east from the Central Park, next to Banco Nacional';
        $location->save();

        $location=new App\Location();
        $location->location='Alajuela - West';
        $location->description='From La Agonía Church, 500mts north contiguous to Pizzería La Piña';
        $location->save();
    }
}
