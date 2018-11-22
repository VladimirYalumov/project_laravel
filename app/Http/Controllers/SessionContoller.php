<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SessionContoller extends Controller
{
	public function create()
	{
		return view('sessions.login');
	}

	public function store()
	{
		if (!auth()->attempt(request(['email', 'password'])) )
		{
			return view('user');
		}
		
		//return view('user');
	}

	public function destroy()
	{
		auth()->logout();
		return view('welcome');
	}
}

