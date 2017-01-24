<?php

namespace App\Http\Controllers;

use App\PasswordHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public static function CheckPasswordHistory($user, $password)
    {

        $newPassword = $password;
        $hashes = DB::table('password_history')->where('userid',$user->id)
            ->orderBy('created_at','desc')
            ->limit(12)->pluck('password');

        foreach ($hashes as $hash) {
            if (Hash::check($newPassword, $hash)) {
                return true;
            }
        }
        return false;

    }
    public static function StorePasswordInHistory($user, $password){
        //Store New Password History
        $passwordhistory = new PasswordHistory();
        $passwordhistory['userid'] = $user->id;
        $passwordhistory['password'] = $password;
        //save
        $passwordhistory->save();
    }
    public static function CheckIfOldPasswordMatches($user,$password){
        $status = booleanValue();
        $oldpassword = ($password);
        $hash = $user->password;


            if (Hash::check($oldpassword, $hash)) {
                $status = true;
            } else
            {
                $status = false;
            }

        return $status ;
    }


    public function storeNewPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|same:password_confirmation|min:10|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
        ]);

        $user = auth()->user();

        //Check if Old Password True
        $oldpasswordCheck = Self::CheckIfOldPasswordMatches($user, $request['old_password']);
        if ($oldpasswordCheck != true) {
            flash('Could not Change Password. You Old Password Does not Match Password Stored');
            return redirect('auth/reset/old');
        }


        //Check If Password Has been Used Before
        $newpasswordCheck = Self::CheckPasswordHistory($user, $request['password']);

        if ($newpasswordCheck != false) {
            flash('Could not Change Password. You have recently used this Password');
            return redirect('auth/reset/old');
        }

        //Update Password_updated_at
        $user->password = $request['password'];
        $user->password_updated_at = Carbon::now();
        $user->update();

        //Store Password
        self::StorePasswordInHistory($user,$request['password']);



        Auth::logout();
        return redirect('/')->with('message', 'Your password has been updated');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}