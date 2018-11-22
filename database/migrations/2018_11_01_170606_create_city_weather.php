<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityWeather extends Migration
{
    public function up()
    {
        Schema::create('city_temp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city',20);
            $table->integer('temp');
            $table->string('service');
            $table->dateTime('date');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('city_temp');
    }
}
