<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class ImagesController extends Controller
{
    public static function uploadSingle($file,$path,$db_path)
    {

        if (isset($file)) {

			$time = (time()* rand(1, 99)) ;
			$ext  =$file->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;
			$file->move($path, $fullname);
			$name =$db_path.'/'.$fullname;
            return $name;
        }
    }

    public static function upload_multiple($request_files, $path,$db_path,$helper_id = NULL)
    {
        $counter = 1;
        $images = array();
        foreach ($request_files as $file) {
            $time = (time()* rand(1, 99)) ;
            $ext  =$file->getClientOriginalExtension();
            $fullname = $time . '.' . $ext;
            $file->move($path, $fullname);
            $name =$db_path.'/'.$fullname;
            
            $images[] =$name;
            $counter++;
        }
        return $images;
    }


}
