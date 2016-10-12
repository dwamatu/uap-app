<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller
{
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required',
            'password'=>'required'
        ]);


        if (Auth::attempt(['email'=> $request['email'], 'password'=> $request['password']])){
            return redirect()->route('dashboard');
        }

        return redirect()-> back();
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}