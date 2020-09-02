<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
	public function index()
	{
		if (Auth::check())
		{
			return \Redirect::route('home.index');
		}
		
		return \View::make('twig.auth.register', [
			'title' => 'Register'
		]);
	}
	
	public function post()
	{		
		$rules = [
			'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ];

        $input = \Request::only(
			'email',
            'password'
        );

        $validator = Validator::make($input, $rules);
		
        if($validator->fails())
        {
            return \Redirect::route('auth.register');
        }
		
		User::create([
			'email' => $input['email'],
			'password' => Hash::make(\Request::get('password'))
        ]);
		
        return \Redirect::route('auth.login');
	}
}