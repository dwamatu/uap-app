<?php

namespace App\Http\Controllers;

use App\Farm;
use DB;


class FarmController extends Controller
{
    public function getFarms (){
        $farms = Farm::all();


        return view('farms.farms',['farms' => $farms]);
    }

}