<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Url;

class VisitsController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'visits');
    }

    public function index()
	{
		$user = Auth::user();
		
		$urls = $user->urls()->get();
		$linksCount = $urls->count();
		$visitsCount = $urls->sum('visits');
		
		return \View::make('twig.visits', [
			'title' => 'Visits',
			'urls' => $urls,
			'linksCount' => $linksCount,
			'visitsCount' => $visitsCount
		]);
	}
}