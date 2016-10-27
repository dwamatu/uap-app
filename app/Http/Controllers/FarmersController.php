<?php

namespace App\Http\Controllers;

use App\Farmer;
use DB;
use FontLib\Table\Type\kern;
use Psy\Util\Json;


class FarmersController extends Controller
{

    public function viewFarmers (){





        return view('farmers.farmers');
    }

    /**
     * @return Json for all Farmers
     */
    public function getFarmers()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "28080",
            CURLOPT_URL => "http://uapapp.netcengroup.com:28080/UAP/getfarmers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 43bb3d0e-8a0e-c60a-5282-0eafdd00368f"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $farmers_array = json_decode($response,true);

            $farmers = array("data" => $farmers_array);
//            dd($farmers);
            echo json_encode($farmers);
        }

    }

}