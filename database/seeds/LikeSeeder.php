<?php

use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $like=new \App\Like();
        $like->movie_id=1;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=1;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=2;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=3;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=3;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=4;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=1;
        $like->save();

        $like=new \App\Like();
        $like->movie_id=7;
        $like->save();
    }
}
