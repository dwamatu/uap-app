<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Model implements AuthenticatableContract,
    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $table = 'users';

    protected $fillable = [
        'first_name','second_name', 'email', 'password','role_id','deleted','creation_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'remember_token',
    ];
}
