<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use App\Models\User;

class VisitsController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'visits');
    }

    public function index()
	{
		return \View::make('twig.visits', [
			'title' => 'Visits'
		]);
	}
}