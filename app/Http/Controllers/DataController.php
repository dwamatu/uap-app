<?php

namespace App\Http\Controllers;


use DB;


class DataController extends Controller
{
    public function getRoles (){
        $roles = json_encode(DB::table('roles')->get());


        echo $roles;
    }

}