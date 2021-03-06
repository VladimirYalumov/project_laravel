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

class YandexAdapter implements Adapter
{
    public function get_weather($lat, $lon) : WeatherDBO
    {
        $weather = new WeatherDBO();

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
        
        // Занесение необходимых данных в массив
        $res = $client->request('GET',"https://api.weather.yandex.ru/v1/informers?lat=$lat&lon=$lon", $options);
        $data = json_decode((string)$res->getBody(),true);
        $temp = [ 'temperature' => $data['fact']['temp'] ];

        $weather = new WeatherDBO();

        $weather->set_temp($data['fact']['temp']);

        $weather->set_service("yandex.ru");

        return $weather;

    }

}