<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\Utilities\FarmerUtilities;
use DB;
use FontLib\Table\Type\kern;
use Psy\Util\Json;


class FarmersController extends Controller
{
    public function viewFarmers()
    {
        return view('farmers.list');
    }

    /**
     * @return Json for all Farmers
     */
    public function getFarmers()
    {
        return (collect(FarmerUtilities::getFarmers())->toJson());
    }
}