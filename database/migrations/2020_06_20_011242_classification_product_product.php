<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassificationProductProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classification_product_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('classification_product_id');
            $table->timestamps();
            /**
             * Keys
             */
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('classification_product_id')->references('id')->on('classification_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('classification_product_product', function (Blueprint $table) {
            $table->dropForeign('classification_product_product_product_id_foreign');
            $table->dropForeign('classification_product_product_classification_product_id_foreign');
        });
        Schema::dropIfExists('classification_product_product');
    }
}
