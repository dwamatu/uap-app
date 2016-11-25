<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract,
    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ShinobiTrait;

    protected $fillable = ['firstname', 'secondname', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function losscalculation(){
        return $this ->belongsTo('App\LossCalculation');
    }
}
