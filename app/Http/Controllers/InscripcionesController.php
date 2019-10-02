<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Direccion;
use App\Persona;
use App\PersonaAuth;
use App\Proceso;
use App\Trabajador;
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


        if ($a->validaTrabajador($trabajador->id)){
            return view('errors.sinacceso');
        }
        $persona_t = Persona::find($trabajador->persona);
        $dir = Direccion::find($persona_t->direccion);

        //Trabajador::find($trabajador);
        //dd($trabajador);
//        dd($persona_t);
        $alumno = Alumno::find($a->alumno);
        $persona_a = Persona::find($alumno->persona);
        $persona_a = Persona::find($alumno->persona);
        $p = PersonaAuth::find($a->persona_autorizada);
        $persona_au = Persona::find($p->persona);
        //dd($persona_au);

        $dir_au = Direccion::find($persona_au->direccion);




        return view('app.proceso.main',[
            'trabajador'=>$trabajador,
            'persona_t'=>$persona_t,
            'persona_a'=>$persona_a ,
            'persona_aut'=>$persona_au ,
            'alumno'=>$a ,
            'dir_au'=> $dir_au,
            'dir'=> $dir
        ]);



    }


}
