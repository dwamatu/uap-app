<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller
{

    public function storeNewPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password'     => 'required|same:password_confirmation|min:10|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
        ]);

        $user = auth()->user();

        $user->password  =  $request['password'];
        $user->password_updated_at = Carbon::now();


        $user->update();

        Auth::logout();
        return redirect('/')->with('message', 'Your password has been updated');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}