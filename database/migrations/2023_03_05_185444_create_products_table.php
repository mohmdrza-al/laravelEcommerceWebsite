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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');

//            Foreign key for Brands table
            $table->foreignId('brandId');
            $table->foreign('brandId')->references('id')->on('brands')->onDelete('cascade');

//            Foreign key for Categories table
            $table->foreignId('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');

            $table->string('slug')->unique();
            $table->string('primaryImage');
            $table->text('description');
            $table->integer('status')->default(1);
            $table->boolean('isActive')->default(1);
            $table->unsignedBigInteger('deliveryAmount')->default(0);
            $table->unsignedBigInteger('deliveryAmountPerProduct')->nullable();
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
        Schema::dropIfExists('products');
    }
};
