<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Url;

class UrlsController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'urls');
    }

    public function index($link)
	{
		$link = Url::where('link', $link)->firstOrFail();
		
		$link->increment('visits'); 
				
		$url = $link->url;
		
		return \Redirect::to($url);
	}
	
    public function post()
	{
		$rules = array( 'url' => 'required' );
		
		$input = \Request::only(array_keys($rules));
		
        $validator = Validator::make($input, $rules);
		
		if($validator->fails())
        {
            return \Redirect::route('home.index');
        }
		
		$link = \Str::random(6);
		
		if (Auth::check())
		{
			$user = Auth::user();
			
			Url::create([
				'url' => $input['url'],
				'user_id' => $user->id,
				'link' => $link
			]);
			
			return \Redirect::route('visits.index');
			
		}
		
		else
		{
			Url::create([
				'url' => $input['url'],
				'link' => $link
			]);
			
			return \Redirect::route('url.index', [$link]);
		}
	}
}