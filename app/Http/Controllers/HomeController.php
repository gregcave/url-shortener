<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use App\Models\User;
use App\Models\Url;

class HomeController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'home');
    }

    public function index()
	{
		$usersCount = User::count();
		$linksCount = Url::count();
		$visitsCount = Url::sum('visits');
		
		return \View::make('twig.home', [
			'title' => 'Home',
			'banner' => true,
			'users_count' => $usersCount,
			'links_count' => $linksCount,
			'visits_count' => $visitsCount,
		]);
	}
}