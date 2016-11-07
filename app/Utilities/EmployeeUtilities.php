<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;

class EmployeeUtilities {

    public static function createEmployee($content) {
        unset($content['_token']);
//        dd(collect($content)->toJson());
        return json_decode(ApiUtilities::IssuePOSTRequest("http://139.59.30.157:3050/api/mtandao/mkoposalo/register", collect($content)->toJson()), true);
    }

    public static function getAllEmployees() {
        $data['apikey'] = "apikey";
        $data['phone'] = "254703413688";

        $apiUrl = "http://139.59.30.157:3050/api/mtandao/mkoposalo/companyemployeesall";

        $data = json_decode(ApiUtilities::IssuePOSTRequest($apiUrl, collect($data)->toJson()), true);
        $data = isset($data['data']) ? $data['data'] : null;
        return $data;
    }

    public static function uploadEmployees($content) {
        unset($content['_token']);
//        dd(collect($content)->toJson());
        return json_decode(ApiUtilities::IssuePOSTRequest("http://139.59.30.157:3050/api/mtandao/mkoposalo/register", collect($content)->toJson()), true);
    }


    public static function getEmployeeDetails($phonenumber) {
        $data['apikey'] = "apikey";
        $data['phone'] = $phonenumber;

        $apiUrl = "http://139.59.30.157:3050/api/mtandao/mkoposalo/account";

        $data = json_decode(ApiUtilities::IssuePOSTRequest($apiUrl, collect($data)->toJson()), true);

        $data = isset($data['data']) ? $data['data'] : null;

        return  $data;
    }


}
