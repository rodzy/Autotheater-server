<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('ticket_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_ticket', function (Blueprint $table) {
            $table->dropForeign('reservation_ticket_reservation_id_foreign');
            $table->dropForeign('reservation_ticket_ticket_id_foreign');
        });
        Schema::dropIfExists('reservation_ticket');
    }
}
