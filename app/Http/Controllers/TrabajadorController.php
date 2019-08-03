<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    //


    /**
     * TrabajadorController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:trabajador');
        $this->middleware('infocomplete', ['except' => ['completainfo']]);
    }

    public function completainfo(){



        return view('app.completar_info.info_persona');
    }



    public function othermain(){
        echo "Otra ruta";
    }


}
