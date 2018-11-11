<?php

namespace App\Http\Controllers;

use App\Adapter\YandexAdapter;
use Illuminate\Http\Request;
use App\Http\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Console\Input\Input;
use DB;
use App\Quotation;

class WeatherController extends Controller
{
    private $lat = "0";
    private $lon = "0";
    private $city;

    function __construct() {
    }
    
    public function check_registration(Request $request){
        DB::table('users')->insert(
            array('login' => $request['login'], 'password' => $request['password'], 'status' => $request['status'])
        );
        return view('welcome');
    }

    public function check_input(Request $request){
        $users = DB::table('users')->get();
        $flag = false;

        foreach ($users as $user) {
            if ( ($user->login == $request['login']) && ($user->password == $request['password']) )
            {
                $flag = true;
                break;
            }
        }

        if ($flag == true)
        {
            if ($user->status == 'admin')
            {
                $city_weather_list = DB::table('city_temp')->get();
                return view('admin', compact('city_weather_list'));
            }
            else if ($user->status == 'user')
            {
                return view('user');
            }
        }
        else
        {
            return view('error');
        }

    }

    public function index(Request $request)
    {
        // Создание адаптера для Яндекс Погоды
        $yandex_adapter = new YandexAdapter();

        // Получение данных из БД полей: широта, долгота, название местности
        $city_pos = DB::table('cities')->where('id', $request['list'])->first();

        // Переваём во view массив данных об указанном городе
        return view('weather', $yandex_adapter->getWeather($city_pos->lat, $city_pos->long, $city_pos->city_name));
    }


}