<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificion extends Model
{

    protected $table = 'notificiones';
    protected $fillable = ['usuario','tipo','url','estado'];


}
