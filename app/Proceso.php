<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{

    protected $table = "proceso";

    protected $fillable = ['trabajador'];

    //


    public function valida(){
        if(
            $this->documentoA != "" &&
            $this->documentoB != "" &&
            $this->documentoC != ""
        ){
            return true;
        }else{
            return false;
        }


    }
}
