<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cendi extends Model
{
    //

    protected $table = "cendi";
    protected $fillable = ['nombre',"telefono","directora","direccion"];
}
