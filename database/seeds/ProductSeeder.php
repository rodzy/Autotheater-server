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
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=1;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Butter Pop Corn';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=1;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Caramelized Pop Corn';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=1;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Coca-cola soda';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=2;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='7 UP soda';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=2;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Natural shake';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=2;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Hot dog';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Cheese burger';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Spicy Nachos';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);

        $product=new App\Product();
        $product->name='Chocolate energy bar';
        $product->description='';
        $product->price=5;
        $product->status=true;
        $product->type_id=3;
        $product->save();
        $product->classificationproducts()->attach([1,2,3,4]);
    }
}
