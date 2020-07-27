<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('sinopsis');
            $table->text('image');
            $table->text('banner');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('classification_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('classification_id')->references('id')->on('classifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign('movie_classification_id_foreign');
            $table->dropColumn('classification_id');
        });
        Schema::dropIfExists('movies');
    }
}
