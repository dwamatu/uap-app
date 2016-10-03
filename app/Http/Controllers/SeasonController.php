<?php

namespace App\Http\Controllers;

use App\Season;
use DB;


class SeasonController extends Controller
{
    public function getSeasons (){
        $seasons = Season::all();


        return view('seasons.seasons',['seasons' => $seasons]);
    }

}