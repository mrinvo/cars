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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('img');
            $table->enum('type',[1,2,3,4,5,6]);
            $table->foreignId('brand_id')->constrained('brands');
            $table->integer('capacity');
            $table->integer('back_capacity');
            $table->integer('doors');
            $table->bigInteger('price');
            $table->bigInteger('discounted_price')->nullable();
            $table->bigInteger('deposit')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
