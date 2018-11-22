<?php

namespace App\DBO;

use Illuminate\Http\Request;
use App\Http\Requests;

use Symfony\Component\Console\Input\Input;
use App\Quotation;


class WeatherDBO
{
	private $temp;
	private $city;
	private $service;

        function __construct($temp, $city, $service) {
            $this->temp = $temp;
            $this->service = $service;
        }
        
        function getTemp() {
            return $this->temp;
        }

        function getCity() {
            return $this->city;
        }

        function getService() {
            return $this->service;
        }


}
