<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{	
    public function index()
    {
		if (Auth::check())
		{
			return \Redirect::route('home.index');
		}
		else
		{
			return \View::make('twig.auth.login', [
				'title' => 'Login'
			]);
		}
    }

    public function post()
	{
		 $rules = array(
			'email' => 'required|exists:users',
            'password' => 'required|min:6'
        );
		
		$input = \Request::only(array_keys($rules));
        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return \Redirect::route('auth.login');
        }
				
		if (Auth::attempt($input))
		{
			return \Redirect::route('home.index');
		}
		else
		{
			return \Redirect::route('auth.login');
		}
	}
}