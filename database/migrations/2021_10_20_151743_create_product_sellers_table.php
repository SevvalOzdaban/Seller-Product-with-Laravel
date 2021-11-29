<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sellerId');
            $table->unsignedInteger('productId');
            //$table->foreign('sellerId')->references('id')->on('sellers');
            $table->integer('price');
            $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sellers');
    }
}
