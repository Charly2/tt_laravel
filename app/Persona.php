<?php

namespace App;


use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    //protected $dateFormat = 'Y-m-d';
    protected $fillable =[
        'nombre',
        'appaterno',
        'apmaterno',
        'fechanac',
        'lugarnac',
        'estadocivil',
        'curp',
        'email',
        'gruposan',
        'direccion',
        'genero'
    ];

    public function direccion(){
        return Direccion::find($this->direccion);
    }



    public function validainfogeneral(){
        //return false;
        if($this->gruposan and
        $this->telefono_fijo and
        $this->telefono_cel ) return true;
        else return false;
    }

    public function setDireccion($data){
        $dir =Direccion::create($data);
        $this->direccion =  $dir->id;;
        $this->save();
    }


    public function nombrecompleto(){
        return $this->nombre." ".$this->appaterno." ".$this->apmaterno;
    }

    public function updateMail($newemail){
        $this->email = $newemail;
        dd($this);
        $this->save();
    }


    public function getEdad(){
        return rand(1,5)." años";
        $to = Carbon::createFromFormat('Y/m/d', $this->fechanac);
        $from = Carbon::now();
        return $to->diffInYears($from)." años";

    }


    public function getEdad2(){
        $to = Carbon::createFromFormat('d/m/Y', $this->fechanac);
        $from = Carbon::now();
        return rand(1,5)." años";

    }

}
