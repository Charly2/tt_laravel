<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos_trabajador extends Model
{
    //

    protected $table = "documentos_trabajador";

    protected $fillable = ['trabajador',
                            'documentoA',
                            'documentoB',
                            'documentoC',
                            'documentoD',
                            'documentoE'];


    public static function findByTrabajador($id){
        $docs  = Documentos_trabajador::where('trabajador',$id)->get()->first();

        if ($docs){
            return $docs;
        }else{
            return Documentos_trabajador::create([
                'trabajador'=> $id,
                'documentoA' => "",
                'documentoB' => "",
                'documentoC' => "",
                'documentoD' => "",
                'documentoE' => ""
            ]);
        }
    }


    public function getFile($key){
        switch ($key){
            case 'documentoA':
                return explode('.',$this->documentoA)[0];
                break;
            case 'documentoB':
                return explode('.',$this->documentoB)[0];
                break;
            case 'documentoC':
                return explode('.',$this->documentoC)[0];
                break;
            case 'documentoD':
                return explode('.',$this->documentoD)[0];
                break;
            case 'documentoE':
                return explode('.',$this->documentoE)[0];
                break;
        }
    }

    public function getExt($key){
        switch ($key){
            case 'documentoA':
                return explode('.',$this->documentoA)[1];
                break;
            case 'documentoB':
                return explode('.',$this->documentoB)[1];
                break;
            case 'documentoC':
                return explode('.',$this->documentoC)[1];
                break;
            case 'documentoD':
                return explode('.',$this->documentoD)[1];
                break;
            case 'documentoE':
                return explode('.',$this->documentoE)[1];
                break;
        }
    }



    public function valida(){
        if(
        $this->documentoA != "" &&
        $this->documentoB != "" &&
        $this->documentoC != "" &&
        $this->documentoD != "" &&
        $this->documentoE != ""
        ){
            return true;
        }else{
            return false;
        }


    }

}
