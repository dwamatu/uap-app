<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 21/12/2016
 * Time: 17:28
 */

namespace App\Http\Controllers;


class ImageController extends Controller
{
    public function getImage($imagename)
    {
        $path = storage_path("inspector_files/$imagename");

        $remoteImage = $path;
        $imginfo = getimagesize($remoteImage);
        header("Content-type: {$imginfo['mime']}");
        readfile($remoteImage);
        dd($remoteImage);
    }

}