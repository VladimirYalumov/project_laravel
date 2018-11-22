<?php
namespace App\Adapter;

use Illuminate\Http\Request;
use App\Http\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Console\Input\Input;
use DB;
use App\Quotation;
use App\DBO\WeatherDBO;

class OpenWeatherAdapter implements Adapter
{
    public function get_weather($lat, $lon) : WeatherDBO
    {
        $weather = new WeatherDBO();

        $client = new Client();
        
        // Занесение необходимых данных в массив
        $res = $client->request('GET',"http://api.openweathermap.org/data/2.5/find?lat=$lat&lon=$lon&appid=4d56ecf2d163adbe801b1b9a65c0c9cd");
        $data = json_decode((string)$res->getBody(),true);

        $weather = new WeatherDBO();

        $weather->set_temp($data['main']['temp']);

        $weather->set_service("openweathermap.org");

        return $weather;

    }

}