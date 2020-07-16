<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new App\Product();
        $product->name='Salty Pop Corn';
        $product->description='The classic, just a little salt and happiness';
        $product->price=5;
        $product->status=true;
        $product->type_id=1;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Butter Pop Corn';
        $product->description='Melty, buttery and great for sharing';
        $product->price=5;
        $product->status=true;
        $product->type_id=1;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Caramelized Pop Corn';
        $product->description='Super sweet pop corn, for the sweet ones';
        $product->price=5;
        $product->status=true;
        $product->type_id=1;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Coca-cola soda';
        $product->description='The classical coke';
        $product->price=5;
        $product->status=true;
        $product->type_id=2;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='7 UP soda';
        $product->description='A light hit of lime and the punch of sweet lime';
        $product->price=5;
        $product->status=true;
        $product->type_id=2;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Natural shake';
        $product->description='Shakes, from fruit extract';
        $product->price=5;
        $product->status=true;
        $product->type_id=2;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Hot dog';
        $product->description='The greatest dog alive filled with cheese, this includes onions, peppers and pickles';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Cheese burger';
        $product->description='Freshly cut ingredients and the best cut of beef filled with cheese, it`s awesome';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Spicy Nachos';
        $product->description='Mexican style nachos, with habbanero and toluca pepper';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Chocolate energy bar';
        $product->description='Just a classic choco bar to get your energy ready' ;
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);
    }
}
