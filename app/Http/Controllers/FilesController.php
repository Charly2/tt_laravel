<?php

namespace App\Http\Controllers;

use App\Prevalidacion;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class FilesController extends Controller
{
    //


    public function verificapreregistro($filename){
        if($filename){
            $preVal = Prevalidacion::find($filename);
            $path = storage_path('app/pre_valid/'.$filename.'/prevalid_'.$filename.".".$preVal->ext);
            $file = File::get($path);
            $type = File::mimeType($path);
            if (file_exists($path)){
                $response = Response::make($file, 200);
                $response->header("Content-Type", $type);
                return $response;

            }else{
                exit('Nose puede acceder al archivo');

            }

        }else{
            exit('URL not found exception');
        }
    }
}
