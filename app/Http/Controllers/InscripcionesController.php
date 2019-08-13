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


        return view('inscripciones.index');

    }
}
