<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
  

    function uploadfile($name){
    	if (Request::hasFile($name)){
    		$file = Request::file($name);
    		$text = $file->getClientOriginalExtension();
    		$filename = str_slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
    		$filesize = $file->getClientSize() / 1024;
    		$file_path = 'uploads/1/'.date('Y-m');
    		Strorage::makeDirectory($file_path);
    		$filename = str_slug($filename,'_').'.'.$ext;

    		if (Storage::putFileAs('app/public/'.$file_path, $file , $filename)){
    			return $file_path.'.'.$filename;
    		} else {
    			return null;
    		}
    	}else{
    		return null;
    	}
    }



    
}
