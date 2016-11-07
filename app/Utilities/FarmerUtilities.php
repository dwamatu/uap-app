<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;
class FarmerUtilities
{
    public static function getFarmers()
    {

        return (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://uapapp.netcengroup.com:28080/UAP/farmerAPI"), true)));

    }
}
