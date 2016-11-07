<?php

namespace App\Utilities;

use App\Utilities\ApiUtilities;

class CustomerUtilities
{
    public static function getFarmerCrops()
    {
        return json_decode(ApiUtilities::IssueGETRequest("http://api.dct.netcengroup.com/index.php/products"), true)['results'];
    }

    public static function updateAggregator($content)
    {
        $farmerId = $content['farmer_id'];
        // Convert to JSON
        $content = collect($content)->toJson();

        return ApiUtilities::issueNoAuthPUTRequest("http://api.dct.netcengroup.com/index.php/aggregators/" . $farmerId, $content);
    }

    public static function updateIndividualCustomer($content)
    {
        $farmerId = $content['farmer_id'];

        // Convert to JSON
        $content = collect($content)->toJson();

        return ApiUtilities::issueNoAuthPUTRequest("http://api.dct.netcengroup.com/index.php/farmers/" . $farmerId, $content);
    }

    public static function createAggregator($content)
    {
        $ares = json_decode(ApiUtilities::IssuePOSTRequest("http://api.dct.netcengroup.com/index.php/aggregators", collect($content)->toJson()), true);
        return $ares;
    }

    public static function createIndividualCustomer($content)
    {
        $res = json_decode(ApiUtilities::IssuePOSTRequest("http://api.dct.netcengroup.com/index.php/farmers", collect($content)->toJson()), true);
        return $res;
    }

    public static function getCustomerDetails($farmer_id)
    {
        $url = "http://api.dct.netcengroup.com/index.php/farmers/" . $farmer_id;

        return json_decode(ApiUtilities::IssueGETRequest($url), true)["farmer"];
    }

    public static function getCountriesForCustomers()
    {
        // TODO: Get route from Kiarie to get countries with customers

        $apiUrl = "http://api.dct.netcengroup.com/index.php/farmers";

        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl), true);

        // TODO: Filter API response to get list of countries

        $countries = $data;
        $testCountries = [
            ["id" => "ke", "name" => "Kenya"],
            ["id" => "rw", "name" => "Rwanda"],
            ["id" => "ug", "name" => "Uganda"],
        ];

        return $testCountries;
    }

    public static function getAggregatorCustomerCount()
    {
        // Get the countries permitted for this user

        $permittedCountries = PermissionUtilities::getUserPermittedCountries();
        $totalCount = 0;

        foreach ($permittedCountries as $key => $value) {
            // TODO: Get route from Kiarie to get count of all aggregator customers in the specified countries

            $apiUrl = "http://api.dct.netcengroup.com/index.php/farmers";
            $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl), true);

            // TODO: Get count value

            $count = $data;

            $totalCount += $count;
        }

        $testTotalCount = 1000;

        // return $totalCount;
        return $testTotalCount;
    }

    public static function getCountriesForAggregatorCustomers()
    {
        // TODO: Get route from Kiarie to get countries with aggregator customers

        $apiUrl = "http://api.dct.netcengroup.com/index.php/farmers";

        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl), true);

        // TODO: Filter API response to get list of countries with aggregator customers

        $countries = $data;
        $testCountries = [
            ["id" => "ke", "name" => "Kenya"],
            ["id" => "rw", "name" => "Rwanda"],
            ["id" => "ug", "name" => "Uganda"],
        ];

        // TODO: Filter countries permitted for this user

        // return PermissionUtilities::filterPermittedCountries($testCountries);

        return $testCountries;
    }

     public static function getFarmsForIndividualFarmers($farmer_id)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/farms?where=farmer_id&equals=" . $farmer_id."&all";
        $farms = array();
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        foreach ($data->results as $item) {
            if ($item->farmer_id == $farmer_id) {
                array_push($farms, $item);
            }
        }
        return json_encode($farms);
    }

    public static function getLivestockForIndividualFarmers($farmer_id)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/livestock?where=farmer_id&equals=" . $farmer_id . "&all";
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        return json_encode($data);
    }

    public static function getCoversForIndividualFarmers($farmer_id)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/insurance/requests?where=farmer_id&equals=" . $farmer_id;
        $farms = array();
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        foreach ($data->results as $item) {
            if ($item->farmer_id == $farmer_id) {
                // change to farmer id
                array_push($farms, $item);
            }
        }
        return json_encode($farms);
    }

    public static function getProvinces()
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/cell/data/provinces?page_size=10000&offset=0";
        $provinces = array();
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        foreach ($data->results as $province) {
            array_push($provinces, $province);
        }
        return json_encode($provinces);
    }


    public static function postGetDistricts($province_id)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/cell/data/districts?where=province&equals=" . $province_id;
        $districts = array();
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        foreach ($data->results as $district) {
            array_push($districts, $district);
        }
        return json_encode($districts);
    }

    public static function postGetSectors($district_id)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/cell/data/sectors?where=district&equals=" . $district_id;
        $sectors = array();
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        foreach ($data->results as $sector) {
            array_push($sectors, $sector);
        }
        return json_encode($sectors);
    }

    public static function postGetCells($sector_id)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/cell/data/cells?where=sector&equals=" . $sector_id;
        $cells = array();
        $data = json_decode(ApiUtilities::IssueGETRequest($apiUrl));
        foreach ($data->results as $cell) {
            array_push($cells, $cell);
        }
        return json_encode($cells);
    }

    public static function putInsuranceRequestData($data)
    {
        $apiUrl = "http://api.dct.netcengroup.com/index.php/insurance/requests";
        $data = json_decode(ApiUtilities::IssuePUTDataRequest($apiUrl, collect($data)->toJson()));
        return json_encode($data);
    }

}
