<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('mobile_model');
            $table->string('image');


            $table->string('ram_rom')->nullable();
            $table->string('sim')->nullable();
            $table->string('camera')->nullable();
            $table->string('processor')->nullable();
            $table->string('battery')->nullable();




            $table->string('prices')->nullable();



            $table->string('specificationram_rom')->nullable();
            $table->string('specificationsim')->nullable();
            $table->string('specificationcamera')->nullable();
            $table->string('specificationprocessor')->nullable();
            $table->string('specificationbattery')->nullable();


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
        Schema::dropIfExists('mobile_categories');
    }
}
