<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;
class LossUtilities
{
    public static function getLosses()
    {

        return (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/fetch/loss/assessment")), true)));

    }
    public static function getLossAssessmentDetails($assessment_id) {


        $data = (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/loss/assessment/report/").$assessment_id), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return $data;

    }
}
