<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->id();

//            Foreign key for Attribute table
            $table->foreignId('attributeId');
            $table->foreign('attributeId')->references('id')->on('attributes')->onDelete('cascade');

//            Foreign key for Products table
            $table->foreignId('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');

            $table->string('value');
            $table->boolean('isActive')->default(1);
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
        Schema::dropIfExists('product_attribute');
    }
};
