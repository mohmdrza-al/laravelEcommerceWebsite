<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

//            Foreign key for Orders table
            $table->foreignId('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');

//            Foreign key for Products table
            $table->foreignId('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');

//            Foreign key for Products variations table
            $table->foreignId('productVariationId');
            $table->foreign('productVariationId')->references('id')->on('product_variations')->onDelete('cascade');

            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('subtotal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
