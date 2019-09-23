<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //

    protected $fillable = [
        'calle', 'num_int', 'num_ext','colonia', 'municipio', 'estado','cp'
    ];



    public function direccionForm(){
        return $this->calle." ".$this->num_int." ".$this->num_ext." ".$this->colonia." ".$this->municipio." ".$this->estado." ".$this->cp;
    }
}
