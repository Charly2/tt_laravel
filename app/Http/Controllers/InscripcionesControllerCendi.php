<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Direccion;
use App\Persona;
use App\Proceso;
use App\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class InscripcionesControllerCendi extends Controller
{
    //


    /**
     * InscripcionesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:cocendi');

    }

    public function index(){



        $pros = Proceso::all();

        return view('inscripciones.indexcendi',['alumnos'=>$pros]);

    }


    public function show($id){
        $a = Proceso::find($id);

        $trabajador = Trabajador::find($a->trabajador);
        $persona_t = Persona::find($trabajador->persona);
        $dir = Direccion::find($persona_t->direccion);
        $alumno = Alumno::find($a->alumno);
        $persona_a = Persona::find($alumno->persona);
        $persona_au = Persona::find($a->persona_autorizada);
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

    public function print($id){
        $a = Proceso::find($id);
        $trabajador = Trabajador::find($a->trabajador);
        $persona_t = Persona::find($trabajador->persona);
        $dir = Direccion::find($persona_t->direccion);
        $alumno = Alumno::find($a->alumno);
        $persona_a = Persona::find($alumno->persona);
        $persona_au = Persona::find($a->persona_autorizada);
        $dir_au = Direccion::find($persona_au->direccion);


        $pdf = PDF::loadView('app.proceso.print', [
            'trabajador'=>$trabajador,
            'persona_t'=>$persona_t,
            'persona_a'=>$persona_a ,
            'persona_aut'=>$persona_au ,
            'alumno'=>$a ,
            'dir_au'=> $dir_au,
            'dir'=> $dir
        ]);

        return $pdf->download('itsolutionstuff.pdf');







    }


}
