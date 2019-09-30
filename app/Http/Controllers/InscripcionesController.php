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

        return view('inscripciones.index',['alumnos'=>$pros]);

    }


    public function show($id){
        $a = Proceso::find($id);
        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();

        $a->validaTrabajador($trabajador->id);

        //trabajador

        dd($a);
    }


}
