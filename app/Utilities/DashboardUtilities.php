<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 11/7/16
 * Time: 5:26 PM
 */

namespace App\Utilities;


class DashboardUtilities
{
    public static function getDashboardDetails()
    {
        $data = (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/dashboard/data"), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return $data;
    }

    public static function getLocations()
    {
        $data = (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/locations"), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return ($data);
    }

    public static function getChartDetails()
    {

        $data = json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/charts"));

        $array = array();
        for ($x = 1; $x <= count($data); $x++) {
            $newArray = array(
                'entries' => $data[$x - 1][0],
                'mnth' => $data[$x - 1][1],
                'yr' => $data[$x - 1][2]
            );
            array_push($array, $newArray);
        }


        return ($array);
    }

    public static function createLossReport($content)
    {
        $createreport = json_decode(ApiUtilities::IssuePOSTRequest("http://localhost:8080/UAP/create/reports", collect($content)->toJson()), true);


        return ($createreport);

    }

    public static function getLossCauses()
    {
        $data = json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/loss/causes"));

        $array = array();
        for ($x = 1; $x <= count($data); $x++) {
            $newArray = array(
                'id' => $data[$x - 1][0],
                'loss_name' => $data[$x - 1][1],

            );
            array_push($array, $newArray);
        }


        return ($array);

    }

    public static function getZones()
    {
        $data = json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/zones"));

        $array = array();
        for ($x = 1; $x <= count($data); $x++) {
            $newArray = array(
                'zone' => $data[$x - 1],


            );
            array_push($array, $newArray);
        }


        return ($array);

    }

    public static function getSeasons()
    {
        $data = json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/seasons"));

        $array = array();
        for ($x = 1; $x <= count($data); $x++) {
            $newArray = array(
                'id' => $data[$x - 1][0],
                'season_date' => $data[$x - 1][1],

            );
            array_push($array, $newArray);
        }


        return ($array);


    }

    public static function getUsers()
    {
        $data = json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/users"));

        $array = array();
        for ($x = 1; $x <= count($data); $x++) {
            $newArray = array(
                'id' => $data[$x - 1][0],
                'user_name' => $data[$x - 1][1],

            );
            array_push($array, $newArray);
        }


        return ($array);

    }
}