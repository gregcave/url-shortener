<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controllers;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'auth');
    }

    public function index()
	{
		return \View::make('twig.auth.login', [
			'title' => 'Login'
		]);
	}
}