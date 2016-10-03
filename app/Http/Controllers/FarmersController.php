<?php

namespace App\Http\Controllers;

use App\Farmer;
use DB;


class FarmersController extends Controller
{

    public function getFarmers (){
        $farmers = Farmer::all();


        return view('farmers.farmers',['farmers' => $farmers]);
    }

}