<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('validadocs');
    }

    public function index(){

        $trabajador = Auth::user()->getTrabajador();

        $pros = Proceso::where('trabajador',$trabajador->id)->get();
        dd($pros);


        $alumnos[] = ['id'=>1,'estado'=>4];
        $alumnos[] = ['id'=>2,'estado'=>2];

        return view('inscripciones.index',['alumnos'=>$alumnos]);

    }
}
