<?php

namespace Smarch\Watchtower\Models;


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
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname','secondname', 'email', 'password','password_updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function hasOldPassword()
    {
        return $this->password_updated_at->lt(Carbon::now()->subMonths(3));
    }
}
