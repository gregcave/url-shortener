<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Index
Route::get('/', function() { return \Redirect::route('home.index'); });

// Home
Route::get('home', ['as' => 'home.index', 'uses' => 'HomeController@index' ]);

// Visits
Route::get('visits', ['as' => 'visits.index', 'uses' => 'VisitsController@index', 'middleware' => ['auth'] ]);

// URLs
Route::get('url/{link}', [ 'as' => 'url.index', 'uses' => 'UrlsController@index' ]);
Route::post('url/create', [ 'as' => 'url.create', 'uses' => 'UrlsController@post' ]);

// Authentication
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function ()
{	
	// Login
	Route::get('/', function() { return \Redirect::route('auth.login'); });
	Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@index' ]);
	Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@post' ]);
	
	// Logout
	Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@index' ]);

	// Registration
	Route::get('register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@index' ]);
	Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@post' ]);
});

if (\App::environment('local'))
{
	// Templates
	Route::group(['prefix' => 'templates', 'as' => 'templates.'], function ()
	{	
		Route::get('/', function() { return \Redirect::route('templates.index'); });
		Route::get('blog', [ 'as' => 'blog', 'uses' => 'TemplatesController@blog' ]);
		Route::get('blog-single', [ 'as' => 'blog-single', 'uses' => 'TemplatesController@blogSingle' ]);
		Route::get('faq', [ 'as' => 'faq', 'uses' => 'TemplatesController@faq' ]);
		Route::get('index', [ 'as' => 'index', 'uses' => 'TemplatesController@index' ]);
		Route::get('payout-rates', [ 'as' => 'payout-rates', 'uses' => 'TemplatesController@payoutRates' ]);
		Route::get('sign-in', [ 'as' => 'sign-in', 'uses' => 'TemplatesController@signIn' ]);
		Route::get('sign-up', [ 'as' => 'sign-up', 'uses' => 'TemplatesController@signUp' ]);
	});
}