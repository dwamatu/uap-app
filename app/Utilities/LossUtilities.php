<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;
class LossUtilities
{
    public static function getLosses()
    {

        return (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/loss/assessment"), true)));

    }
    public static function getLossAssessmentDetails($assessment_id) {


        $data = (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/loss/assessment/report/".$assessment_id), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return $data;

    }
}
