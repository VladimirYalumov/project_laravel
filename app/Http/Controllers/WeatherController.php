<?php

namespace App\Http\Controllers;

use App\Adapter\YandexAdapter;
use App\Adapter\OpenWeatherAdapter;
use App\DBO\WeatherDBO;
use App\WeatherModel;
use Illuminate\Http\Request;
use App\Http\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Console\Input\Input;
use DB;
use App\Quotation;
use App\City;
use App\CityTemp;

class WeatherController extends Controller
{

    public function index(Request $request)
    {
        // Создание адаптера для Яндекс Погоды
        $yandex_adapter = new OpenWeatherAdapter();

        $weather = new WeatherDBO();

        // Получение данных из БД полей: широта, долгота, название местности
        $city_pos = $this->get_city_data($request);

        $weather = $yandex_adapter->get_weather($city_pos->lat, $city_pos->long);

        $weather_data_array = ['weather_temp' => $weather->get_temp(), 'city_name' => $weather->get_city()];
        
        // Запись данных в БД
        $this->set_city_temperature(
            $city_pos->cityName,             
            $weather->getTemp(), 
            date('Y-m-d H:i:s'),
            $weather->get_service()
        );

        // Передаём во view массив данных об указанном городе
        return view('weather', compact('weather'));
    }


    public function get_city_data($request)
    {
        $city = City::all()->where('id', $request['list'])->first();
        return $city;
    }


    public function set_city_temperature($city, $temp, $date, $service)
    {
        $city = CityTemp::create(
        [
            'city' => $city,
            'temp' => $temp,
            'service' => $service,
            'date' => $date
        ]);

        return;
    }
}