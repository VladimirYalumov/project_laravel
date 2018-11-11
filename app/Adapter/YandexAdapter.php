<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 08.11.18
 * Time: 8:49
 */

namespace App\Adapter;

use Illuminate\Http\Request;
use App\Http\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Console\Input\Input;
use DB;
use App\Quotation;

class YandexAdapter implements Adapter
{
    public function getWeather($lat, $lon, $city)
    {
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
        $array = [ 'var1' => $data['fact']['temp'], 'var2' => $city];

        //Запись данных в БД
        
        DB::table('city_temp')->insert(array('city' => $city, 'temp' => $data['fact']['temp'], 'date' => date('Y-m-d H:i:s')));
        
        return $array;
    }

}