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
        Schema::create('attribute_category', function (Blueprint $table) {

//            Foreign key for Attribute table
            $table->foreignId('attributeId');
            $table->foreign('attributeId')->references('id')->on('attributes')->onDelete('cascade');

//            Foreign key for Categories table
            $table->foreignId('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');

            $table->boolean('isFilter')->default(0);
            $table->boolean('isVariation')->default(0);

            $table->primary(['attributeId', 'categoryId']);
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
        Schema::dropIfExists('attribute_category');
    }
};
