<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 21/12/2016
 * Time: 17:28
 */

namespace App\Http\Controllers;


use App\Utilities\LossUtilities;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage($id,$imagename)
    {
        $assessmentDetails = LossUtilities::getLossAssessmentDetails($id);



        $pageData = $assessmentDetails[0];

        $uuid  = $pageData['uuid'];

        $path = storage_path("app/inspection_images/$uuid/$imagename");

//        $remoteImage = $path;
//        $imginfo = getimagesize($remoteImage);
//        header("Content-type: {$imginfo['mime']}");
//        readfile($remoteImage);
        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    });


//        return Storage::get($path);
    }

}