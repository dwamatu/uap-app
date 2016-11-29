<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 29/11/2016
 * Time: 12:42
 */

namespace App\Utilities;


class InspectorUtilities
{
public static function getCropInspectors(){
    return (array("data" => json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/inspectors"), true)));

}

    public static function getInspectorDetails($id)
    {
        $data = json_decode(ApiUtilities::IssueGETRequest("http://localhost:8080/UAP/fetch/inspector/".$id), true);

//        $data = isset($data['data']) ? $data['data'] : null;

        return ($data [0])  ;
    }

    public static function addInspector($content)
    {

        return (array("data" => json_decode(ApiUtilities::IssuePOSTRequest("http://localhost:8080/UAP/register/user", collect($content)->toJson()), true)));
    }

    public static function updateInpector($content)
    {
        return (array("data" => json_decode(ApiUtilities::IssuePOSTRequest("http://localhost:8080/UAP/update/user", collect($content)->toJson()), true)));
    }
}