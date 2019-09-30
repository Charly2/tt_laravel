<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{

    protected $table = "proceso";

    protected $fillable = ['trabajador'];

    //

    public function getNombreAlumno(){

        return Alumno::find($this->alumno)->getPersona()->nombrecompleto();
    }

    public function getEdadAlumno(){
        return Alumno::find($this->alumno)->getPersona()->getEdad();
    }



    public function getCendi(){
        return $this->cendi;
    }



    public function validaTrabajador(){
        return $this->
    }


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
