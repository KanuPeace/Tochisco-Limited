<?php 
namespace App\Helpers;

use Illuminate\Http\Request;


class MediaFilesHelper
{
    public static function saveFromRequest($file , $path , $storage = "public"){ 
        $file_name = uniqid().".".$file->extension();
        $file->move(public_path($path) , $file_name);
        return $path."/".$file_name;
    }
}