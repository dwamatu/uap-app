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

    protected $fillable = ['firstname', 'secondname', 'email', 'password','password_updated_at','active','last_login','is_deleted'];

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
        $updateAt = Carbon::createFromFormat('Y-m-d H:i:s',$this->password_updated_at);

        return $updateAt->lt(Carbon::now()->subMonths(3));
    }


    /**
     * Set the password attribute.
     *
     * @param string $password
     */
//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }

}
