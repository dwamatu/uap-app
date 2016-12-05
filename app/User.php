<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class user extends eloquent implements authenticatablecontract,
    canresetpasswordcontract
{
    use authenticatable, canresetpassword, shinobitrait;

    protected $fillable = ['firstname', 'secondname', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * the attributes that should be hidden for arrays.
     *
     * @var array
     */


}
