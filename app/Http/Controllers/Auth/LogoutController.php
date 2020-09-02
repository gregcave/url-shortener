<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LogoutController extends Controller
{	
    public function index()
	{
		if (!Auth::check())
		{
			return \Redirect::route('auth.login');
		}
		else
		{		
			Auth::logout();
			\Session::flush();
			return \Redirect::route('home.index');
		}
	}
}