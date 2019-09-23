<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaAuth extends Model
{
    protected $table = "persona_autorizada";
    protected $fillable = [
        'persona',
        'parentesco'
    ];


    //
}
