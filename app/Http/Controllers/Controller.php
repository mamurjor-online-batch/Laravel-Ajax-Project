<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function file_upload($file,$folder){
        $product_file = $file;
        $file_extension = $product_file->getClientOriginalExtension();
        $product_image_name = time().rand().'.'.$file_extension;
        $product_file->move($folder,$product_image_name);
        return $product_image_name;
    }

    protected function file_updated($file,$folder,$old_file){
        // previous file remove form resource
        if($old_file != null){
            file_exists($folder.$old_file) ? unlink($folder.$old_file) : false;
        }

        $product_file = $file;
        $file_extension = $product_file->getClientOriginalExtension();
        $product_image_name = time().rand().'.'.$file_extension;
        $product_file->move($folder,$product_image_name);
        return $product_image_name;
    }


    protected function file_remove($folder,$old_file){
        return file_exists($folder.$old_file) ? unlink($folder.$old_file) : false;
    }

}
