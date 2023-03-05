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
        Schema::create('product_rate', function (Blueprint $table) {
            $table->id();

//            Foreign key for Users table
            $table->foreignId('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

//            Foreign key for Products table
            $table->foreignId('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');

            $table->tinyInteger('rate');
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
        Schema::dropIfExists('product_rate');
    }
};
