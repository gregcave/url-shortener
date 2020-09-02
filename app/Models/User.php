<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB; 

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
	use \App\Traits\UsesUUID;
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
    protected $fillable = [
		'id', 'email', 'password', 'password'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 
	protected $hidden = [
		'remember_token',
	];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
    /* Relations */

    public function urls()
    {
        return $this->hasMany('App\Models\Url');
    }
}
