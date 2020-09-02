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
Route::get('visits', ['as' => 'visits.index', 'uses' => 'VisitsController@index' ]);

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