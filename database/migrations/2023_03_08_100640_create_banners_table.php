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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('isActive')->default(1);
            $table->string('type');
            $table->string('buttonText')->nullable();
            $table->string('buttonLink')->nullable();
            $table->string('buttonIcon')->nullable();

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
        Schema::dropIfExists('banners');
    }
};
