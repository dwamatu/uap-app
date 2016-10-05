<?php
namespace App;

namespace Smarch\Watchtower\Models;


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

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name', 'email','username','role_id', 'password','deleted', 'creation_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
