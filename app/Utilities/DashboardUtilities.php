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
    public static function getDashboardDetails(){
        $data= (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/dashboard/data"), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return $data;
    }
    public static function getLocations(){
        $data= (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/locations"), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return ($data);
    }
}