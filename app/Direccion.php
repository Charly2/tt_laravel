<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //

    protected $fillable = [
        'calle', 'num_int', 'num_ext','colonia', 'municipio', 'estado','cp'
    ];


}
