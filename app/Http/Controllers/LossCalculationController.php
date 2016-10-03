<?php

namespace App\Http\Controllers;

use App\LossCalculation;

use DB;


class LossCalculationController extends Controller
{
    public function getLossCalculations (){
        $loss_calculations = LossCalculation::all();


        return view('loss.calculation.calculation',['loss_calculations' => $loss_calculations]);
    }

}