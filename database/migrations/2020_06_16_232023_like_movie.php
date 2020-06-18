<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LikeMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_movie', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('like_id');
            $table->unsignedInteger('movie_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('like_id')->references('id')->on('likes');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('like_movie', function (Blueprint $table) {
            $table->dropForeign('like_movie_like_id_foreign');
            $table->dropForeign('like_movie_movie_id_foreign');
        });
        Schema::dropIfExists('like_movie');
    }
}
