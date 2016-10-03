<?php

namespace App\Http\Controllers;

use App\UserStatus;
use DB;


class UserStatusController extends Controller
{
    public function getUserStatuses (){
        $statuses = UserStatus::all();


        return view('status.status',['statuses' => $statuses]);
    }

}