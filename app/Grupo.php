<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $fillable = [
        'nombre','next','cupo','cendi','nivel'
    ];
}
