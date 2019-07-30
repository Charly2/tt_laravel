<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prevalidacion extends Model
{
    protected $fillable = ['doc','estado','persona','num_emp','ct','ext','email'];



    public function persona(){
        return Persona::find($this->persona);
    }


    public function gettxtestado(){
        switch ($this->estado){
            case 1:
                return "Pendiente";
            break;
            case 2:
                return "Validado";
            break;
            case 3:
                return "Rechazado";
            break;
        }
    }

}
