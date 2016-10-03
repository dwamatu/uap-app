<?php

namespace App\Http\Controllers;



use App\LossCause;

class LossCauseController extends Controller
{
    public function getCauses (){
        $causes = LossCause::all();


        return view('loss.cause.loss',['causes' => $causes]);
    }

}