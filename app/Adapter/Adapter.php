<?php

namespace App\Adapter;

use App\DBO\WeatherDBO;


interface Adapter
{
    public function get_weather($lat, $lon):WeatherDBO;
}