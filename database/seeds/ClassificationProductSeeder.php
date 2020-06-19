<?php

use Illuminate\Database\Seeder;

class ClassificationProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classificationproduct=new App\ClassificationProduct();
        $classificationproduct->type='Kids size';
        $classificationproduct->description='The standard size for most under age of 10';
        $classificationproduct->save();

        $classificationproduct=new App\ClassificationProduct();
        $classificationproduct->type='Small';
        $classificationproduct->description='An small portion but still powerfull';
        $classificationproduct->save();

        $classificationproduct=new App\ClassificationProduct();
        $classificationproduct->type='Medium';
        $classificationproduct->description='The way to go for any normal person';
        $classificationproduct->save();

        $classificationproduct=new App\ClassificationProduct();
        $classificationproduct->type='Large';
        $classificationproduct->description='Great for sharing with your loving ones';
        $classificationproduct->save();


    }
}
