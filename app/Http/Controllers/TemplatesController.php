<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;

class TemplatesController extends Controller
{
    public function __construct()
    {
		\View::share('selected', 'templates');
    }

    public function blog()
	{
		return \View::make('twig.templates.blog', [
			'title' => 'Blog'
		]);
	}
	
    public function blogSingle()
	{
		return \View::make('twig.templates.blog_single', [
			'title' => 'Blog Single'
		]);
	}
	
    public function faq()
	{
		return \View::make('twig.templates.faq', [
			'title' => 'FAQ'
		]);
	}
	
    public function index()
	{
		return \View::make('twig.templates.index', [
			'title' => 'Index',
			'banner' => true
		]);
	}
	
    public function payoutRates()
	{
		return \View::make('twig.templates.payout_rates', [
			'title' => 'Payout Rates'
		]);
	}
	
    public function signIn()
	{
		return \View::make('twig.templates.sign_in', [
			'title' => 'Sign In'
		]);
	}
	
    public function signUp()
	{
		return \View::make('twig.templates.sign_up', [
			'title' => 'Sign Up'
		]);
	}
}