<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'home');
    }

    public function index()
	{
		return \View::make('twig.home', [
			'title' => 'Home'
		]);
	}
}