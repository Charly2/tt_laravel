<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prevalidacion extends Model
{
    protected $fillable = ['doc','estado','persona','num_emp','ct','ext'];



    public function persona(){
        return Persona::find($this->persona);
    }

}
