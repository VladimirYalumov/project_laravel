<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 11.11.18
 * Time: 14:58
 */

namespace App\Adapter;


interface Adapter
{
    public function getWeather($lat, $lon, $city);
}