<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;
class FarmerUtilities
{
    public static function getFarmers()
    {

        return (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/fetch/farmers")), true)));

    }
}
