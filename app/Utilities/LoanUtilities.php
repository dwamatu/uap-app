<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;

class LoanUtilities {

    public static function getLoanApplications() {
        $data['apikey'] = "apikey";
        $data['phone'] = "254703413688";

//        $apiUrl = "http://139.59.30.157:3050/api/mtandao/mkoposalo/loanapplications";
//
//        $data = json_decode(ApiUtilities::IssuePOSTRequest($apiUrl, collect($data)->toJson()), true);
//        $data = isset($data['data']) ? $data['data'] : null;
//
//        return $data;

        return array(
            array(
                'name' => 'Simon Kiarie Njoroge',
                'loanno' => 'HGSHJAGHJG',
                'amount' => '1000',
                'applicationdate' => '2016-10-23',
                'repaymentdate' => '2016-11-23',
            )
        );
    }

}
