<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 23/01/2017
 * Time: 10:18
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class PasswordHistory extends Model
{
    protected $table = 'password_history';

//    protected $fillable = ['userid', 'password'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);

    }
}