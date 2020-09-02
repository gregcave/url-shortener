<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	use \App\Traits\UsesUUID;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
    protected $fillable = [
		'user_id', 'url', 'slug', 'used'
	];

	/* Relations */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
