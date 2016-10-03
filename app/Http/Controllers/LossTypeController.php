<?php

namespace App\Http\Controllers;



use App\LossType;

class LossTypeController extends Controller
{
    public function getLossTypes (){
        $losstypes = LossType::all();


        return view('loss.type.type',['losstypes' => $losstypes]);
    }

}
