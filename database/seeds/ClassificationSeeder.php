<?php

use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classification=new App\Classification();
        $classification->type='G';
        $classification->description='General';
        $classification->save();

        $classification=new App\Classification();
        $classification->type='PG';
        $classification->description='Parental guidence recommended';
        $classification->save();

        $classification=new App\Classification();
        $classification->type='M';
        $classification->descrip0tion='Recommended for mature audiences';
        $classification->save();

        $classification=new App\Classification();
        $classification->type='MA 15+';
        $classification->description='Not suitable for people under 15, under 15s must be accompanied by a parent or adult guardian';
        $classification->save();

        $classification=new App\Classification();
        $classification->type='R 18+';
        $classification->description='Restricted to 18 and over';
        $classification->save();

        $classification=new App\Classification();
        $classification->type='X 18+';
        $classification->description='Restricted to 18 and over';
        $classification->save();

    }
}
