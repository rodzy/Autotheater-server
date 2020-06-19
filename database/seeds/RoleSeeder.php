<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name = 'administrator';
        $role->description = 'Bussiness and systems administrator';
        $role->save();

        $role = new \App\Role();
        $role->name = 'client';
        $role->description = 'All of the customers';
        $role->save();
        
    }
}
