<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{

    protected $table = "proceso";

    protected $fillable = ['trabajador','nivel'];

    //

    public function getAlumno(){
        return Alumno::find($this->alumno)->getPersona();
    }

    public function getNombreAlumno(){

        return Alumno::find($this->alumno)->getPersona()->nombrecompleto();
    }

    public function getEdadAlumno(){
        return Alumno::find($this->alumno)->getPersona()->getEdad();
    }
    public function getEdadAlumno2(){
        return rand(1,5)." años";
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

    public function getPhoto(){
        return $this->trabajador;
        return User::where('entidad',Trabajador::find($this->trabajador)->id)->where('rol','trabajador')->get()->first()->id;
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
