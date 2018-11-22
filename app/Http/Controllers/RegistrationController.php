<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('/registration');
    }

    public function store()
    {
    	// Проверяем форму
    	$this->validate(request(), [

    		'email' => 'required|email',
    		'password' => 'required'

    	]);

    	// Создаём и сохраняем пользователя
    	$user = User::create(request(['email', 'password']));

    	// Авторизовать пользователя
    	auth()->login($user);

    	// Перенаправляем на домашнюю страницу
    	return view('welcome');
    }

}
