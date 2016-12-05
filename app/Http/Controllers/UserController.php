<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller
{
//    public function postSignIn(Request $request)
//    {
//        $this->validate($request, [
//            'email'=> 'required',
//            'password'=>'required'
//        ]);
//
//
//        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
//            $userId = Auth::user()->id;
//            $active = DB::table('users')->where('id', $userId)->value('password_updated_at');
//            $dt=(Carbon::createFromFormat('Y-m-d H:i:s',$active));
//            $now =Carbon::now()->subMonths(3);
//
////            dd($now ->gt($dt));
//
//            if ($now ->gt($dt) != true )
//                return redirect()->route('dashboard');
//            else {
//
//                return redirect('/auth/reset/old');
//            }
//
//
//        }
//
//        return redirect()-> back();
//    }
    public function storeNewPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password'     => 'required|same:password_confirmation|min:8',
        ]);

        $user = auth()->user();

        $user->password  = bcrypt( $request['password']);
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