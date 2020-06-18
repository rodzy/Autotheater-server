<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenreMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_movie', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('movie_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('genre_id')->references('id')->on('genres');
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
        Schema::table('genre_movie', function (Blueprint $table) {
            $table->dropForeign('genre_movie_genre_id_foreign');
            $table->dropForeign('genre_movie_movie_id_foreign');
        });
        Schema::dropIfExists('genre_movie');
    }
}
