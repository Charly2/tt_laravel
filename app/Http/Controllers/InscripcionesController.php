<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
    //


    /**
     * InscripcionesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('infocomplete');
    }

    public function index(){

        $alumnos[] = ['id'=>1,'estado'=>4];
        $alumnos[] = ['id'=>2,'estado'=>2];

        return view('inscripciones.index',['alumnos'=>$alumnos]);

    }
}
