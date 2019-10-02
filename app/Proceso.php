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

    public function getNombreTrabajador(){
            return Trabajador::find($this->trabajador)->getPersona()->nombrecompleto();

    }
    public function getNumTrabajador(){
            return Trabajador::find($this->trabajador)->numtrabajador;

    }

    public function getCendi(){
        return $this->cendi;
    }



    public function validaTrabajador($i){
        return $this->trabajador != $i ? true:false;
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
