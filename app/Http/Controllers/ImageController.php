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
    public function getImage($imagePath)
    {
        $remoteImage = $imagePath;
        $imginfo = getimagesize($remoteImage);
        header("Content-type: {$imginfo['mime']}");
        readfile($remoteImage);
    }
}