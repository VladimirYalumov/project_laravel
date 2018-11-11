<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCityWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //if(Schema::hasTable('city_temp')){
            Schema::table('city_temp', function (Blueprint $table)
            {
                //if(!Schema::hasColumn('temp'))
                    $table->integer('temp');
                    $table->dateTime('date');

            });
    }

    public function down()
    {
        Schema::table('city_temp', function (Blueprint $table) {
            $table->dropColumn('temp');
            $table->dropColumn('date');
        });
    }
}
