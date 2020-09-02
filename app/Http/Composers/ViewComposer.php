<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Stock;

class ViewComposer
{
    /**
     * Create a view composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {		
		if($this->user)
        {
			$view->with('auth_user', $this->user);
        }
    }
}