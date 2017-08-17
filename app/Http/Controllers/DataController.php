<?php

namespace App\Http\Controllers;


use App\Utilities\CustomerUtilities;
use Carbon\Carbon;
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
     * @return Get All Roles with End Date
     */
    public function getRoles()
    {
        return collect(DashboardUtilities::getRoles())->toJson();
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
        $newReportDetails = $request->only(['date_start', 'cause_of_loss', 'crop_inspector', 'season', 'ext_area']);


        $range = $request['range'];
        if ($range != null) {
            $myString = $range;
            $myArray = explode(',', $myString);
            $newReportDetails['loss_start'] = $myArray[0];
            $newReportDetails['loss_end'] = $myArray[1];
        } else {
            $newReportDetails['loss_start'] = 0;
            $newReportDetails['loss_end'] = 100;
        }

        $carbon = \Carbon\Carbon::createFromFormat('Y-n-j', $request['date_end']);
        //Add A day to get current records
        $newdate = $carbon->addDay(1)->toDateString();
        //Add the date back to the newReportData
        $newReportDetails['date_end'] = $newdate;
//        \Log::info('New Report Details',['report' => $newReportDetails]);

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