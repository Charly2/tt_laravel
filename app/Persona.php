<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $dateFormat = 'Y-m-d';
    protected $fillable =[
        'nombre',
        'appaterno',
        'apmaterno',
        'fechanac',
        'lugarnac',
        'estadocivil',
        'curp',
        'gruposan',
        'direccion',
        'genero'
    ];

    public function direccion(){
        return Direccion::find($this->direccion);
    }

    public function setDireccion($data){
        $dir =Direccion::create($data);
        $this->direccion =  $dir->id;;
        $this->save();
    }


    public function nombrecompleto(){
        return $this->nombre." ".$this->appaterno." ".$this->apmaterno;
    }

}
