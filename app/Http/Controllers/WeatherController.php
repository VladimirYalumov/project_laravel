<?php

namespace App\Http\Controllers;

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
    private $city_arr = [];

    function __construct() {
        $this->city_arr = ["Moscow","Paris","London"];
    }

    public function index()
    {
        $input = $_GET['city'];
        $city = "";
        if ($input == "москва")
        {
            $this->lat = "46";
            $this->lon = "37";
            $city = $this->city_arr[0];
        }
        else if ($input == "париж")
        {
            $this->lat = "49";
            $this->lon = "2";
            $city = $this->city_arr[1];
        }
        else if ($input == "лондон")
        {
            $this->lat = "51.5";
            $this->lon = "0";
            $city = $this->city_arr[2];
        }

        $client = new Client();
        $options =
        [
            'headers' =>
                [
                    'Accept' => 'application/json',
                    'Contect-type' => 'application/json',
                    'X-Yandex-API-Key' => 'ab5539c6-60df-40be-a1ae-b9980a94ca8b'
                ]
        ];

            $res = $client->request('GET',"https://api.weather.yandex.ru/v1/informers?lat=$this->lat&lon=$this->lon", $options);
            $data = json_decode((string)$res->getBody(),true);
            $array = [ 'var1' => $data['fact']['temp'], 'var2' => $city];

            DB::table('city_temp')->insert(
            array('city' => $city, 'temp' => $data['fact']['temp'], 'date' => date('Y-m-d H:i:s'))
            );

            return view('weather', $array);
    }

}