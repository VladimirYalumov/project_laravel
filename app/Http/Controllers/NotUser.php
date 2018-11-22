<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\Console\Input\Input;
use DB;
use App\Quotation;

class User
{
    public function check_registration(Request $request){
        $token = md5(uniqid(rand(), TRUE));
        $msg='';
        $address_site = "http://test.local";

        $token = md5(uniqid(rand(), TRUE));
        $subject="Подтверждение электронной почты";

        $count_mail = DB::table('users')->select('email')->where('email', $request['email'])->count();
        $count_login = DB::table('users')->select('login')->where('login', $request['login'])->count();

        if ( (empty($count_mail)) || (empty($count_login)) )
        {
            DB::table('users')->insert(
                array('login' => $request['login'], 'password' => $request['password'], 'status' => 'user', 'email' => $request['email'])
            );
            

            $msg = 'Please click this link to verify your email: test.local?token='.$token;

            mail($request['email'], $subject, $msg);
            return view('welcome');
        }
        else
        {
            $msg= 'Данный адрес электронный почты или логин уже занят, пожалуйста, введите другой. ';
            return view('registration', compact('msg'));
        }
    }

    public function check_input(Request $request){
        $users = DB::table('users')->get();
        $flag = false;


        // Проверка существования пользователя
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

}