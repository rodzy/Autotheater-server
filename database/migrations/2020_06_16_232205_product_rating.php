<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('rating_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('rating_id')->references('id')->on('ratings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_rating', function (Blueprint $table) {
            $table->dropForeign('product_rating_product_id_foreign');
            $table->dropForeign('product_rating_rating_id_foreign');
        });
        Schema::dropIfExists('product_rating');
    }
}
