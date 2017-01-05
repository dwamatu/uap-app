<?php

namespace App\Utilities;

use App\User;
use App\Utilities\ApiUtilities;
use Illuminate\Support\Facades\Auth;

class LossUtilities
{
    public static function getConfirmedLosses()
    {

        return (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/fetch/confirmed/assessments")), true)));

    }
    public static function getReportedLosses()
    {

        return (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/fetch/reported/assessments")), true)));

    }
    public static function getLossAssessmentDetails($assessment_id) {


        $data = (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/loss/assessment/report/").$assessment_id), true)));
        $data = isset($data['data']) ? $data['data'] : null;
        return $data;

    }

    public static function confirmLossAssesment($uuid)
    {

        $useremail=  Auth::user()->email;
        return (array("data" => json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL("/confirmLossReport/$uuid/$useremail")), true)));

    }
}
