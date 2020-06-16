<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billboards', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_now');
            $table->date('show_date');
            $table->boolean('status');
            $table->integer('capacity');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('location_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropForeign('billboard_movie_id_foreign');
            $table->dropForeign('billboard_location_id_foreign');
            $table->dropColumn('movie_id');
            $table->dropColumn('location_id');
        });
        Schema::dropIfExists('billboards');
    }
}
