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
        'extencionoficina',
    ];


    public function persona(){
        return Direccion::find($this->direccion);
    }

    public function setPersona($data){
        $dir =Persona::create($data);
        $this->persona =  $dir->id;;
        $this->save();
    }





}
