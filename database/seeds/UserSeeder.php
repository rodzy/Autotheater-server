<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'administrator',
            'email' => 'admin@autotheater.co',
            'password' => bcrypt('1234567890'),
            'role_id' => 1
        ]);
        $user->save();
    }
}
