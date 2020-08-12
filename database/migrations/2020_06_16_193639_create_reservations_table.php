<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_now');
            $table->decimal('tax');
            $table->decimal('total');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('billboard_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('billboard_id')->references('id')->on('billboards');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign('reservation_billboard_id_foreign');
            $table->dropForeign('reservation_user_id_foreign');
            $table->dropColumn('billboard_id');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('reservations');
    }
}
