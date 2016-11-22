<?php

namespace App\Http\Controllers;


use App\Utilities\CustomerUtilities;
use Illuminate\Http\Request;
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


        ($pageData = (($Data)));

        return view('dashboard', ['pageData' => $pageData]);


    }

    public function getLocations()
    {
        return collect(DashboardUtilities::getLocations())->toJson();

    }

    /**
     * @return Get Causes of Losses
     */
    public function getLossCauses()
    {
        return collect(DashboardUtilities::getLossCauses())->toJson();
    }

    /**
     * @return Get Zones
     */
    public function getZones()
    {
        return collect(DashboardUtilities::getZones())->toJson();
    }

    /**
     * @return Get All Seasons with End Date
     */
    public function getSeasons()
    {
        return collect(DashboardUtilities::getSeasons())->toJson();
    }

    /**
     * @return string
     */
    public function getChartDetails()
    {
        return collect(DashboardUtilities::getChartDetails())->toJson();
    }

    /**
     * @return string
     */
    public function postReportData(Request $request)
    {
        $newReportDetails = $request->only(['date_start', 'date_end', 'cause_of_loss', 'crop_inspector', 'season', 'ext_area']);


        $range = $request['range'];
        if ($range != null){
            $myString = $range;
            $myArray = explode(',', $myString);
            $newReportDetails['loss_start'] = $myArray[0];
            $newReportDetails['loss_end'] = $myArray[1];
        }
        else{
            $newReportDetails['loss_start'] = 0;
            $newReportDetails['loss_end'] = 100;
        }


       return (collect(DashboardUtilities::createLossReport($newReportDetails)));

    }

    /**
     * @return Fetch All / Users or Crop Inspectors
     */
    public function getUsers()
    {
        return collect(DashboardUtilities::getUsers())->toJson();
    }

}