<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();

            $table->string('phone')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathroom')->nullable();

            $table->longText('description')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();

            $table->tinyInteger('status')->default(1)->nullable();

            $table->unsignedBigInteger('house_category_id')->nullable();
            $table->foreign('house_category_id')->references('id')->on('house_category')->onDelete('cascade');

            $table->unsignedBigInteger('room_category_id')->nullable();
            $table->foreign('room_category_id')->references('id')->on('room_category')->onDelete('cascade');

            $table->unsignedBigInteger('cities_id')->nullable();
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade');

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
        Schema::dropIfExists('houses');
    }
}
