<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract,
    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ShinobiTrait;

    protected $fillable = ['firstname', 'secondname', 'email', 'password','password_updated_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * the attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * Check if user has an old password that needs to be reset
     * @return boolean
     */
    public function hasOldPassword()
    {
        $lastlogin = Carbon::createFromFormat('Y-m-d H:i:s',$this->password_updated_at);

        return $lastlogin->lt(Carbon::now()->subMonths(3));
    }

}
