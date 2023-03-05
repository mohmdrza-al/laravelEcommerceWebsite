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
        Schema::create('product_tag', function (Blueprint $table) {

//            Foreign key for Tags table
            $table->foreignId('tagId');
            $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');

//            Foreign key for Product table
            $table->foreignId('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');

            $table->primary(['tagId', 'productId']);

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
        Schema::dropIfExists('product_tag');
    }
};
