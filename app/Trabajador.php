<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{


    protected $table = 'trabajadores';
    protected $fillable = ['persona',
        'centrodetrabajo',
        'numtrabajador',
        'sueldomensual',
        'horasalida',
        'ocupacion',
        'puesto',
        'horaentrada',
        'centrodetrabajo',
        'telefonooficina',
        'extencionoficina','estado'
    ];


    public function persona(){
        return Persona::find($this->persona);
    }

    public function getPersona(){
        return Persona::find($this->persona);
    }

    public function setPersona($data){
        $dir =Persona::create($data);
        $this->persona =  $dir->id;;
        $this->save();
    }





}
