<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //

    protected $fillable = ['persona'];


    protected $table = "alumno";




    public function getPersona(){
       return Persona::find($this->persona);
    }

}
