<?php

namespace App\Http\Controllers;


use App\Utilities\DashboardUtilities;
use DB;


class DataController extends Controller
{
    /**
     * @return string
     */
    public function getDashboard()
    {
        $dashboardDetails = (DashboardUtilities::getDashboardDetails());
        $Data = collect([]);

        $Data = $dashboardDetails;


         ($pageData =(($Data)));

        return view('dashboard', ['pageData' => $pageData]);


    }
    public function getLocations()
    {
        return collect(DashboardUtilities::getLocations())->toJson();

    }


}