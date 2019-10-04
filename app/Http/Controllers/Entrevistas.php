<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Persona;
use App\Pregunta;
use App\Proceso;
use Illuminate\Http\Request;

class Entrevistas extends Controller
{
    //



    protected function llena()
    {


            $categoria = 1;
            $id = 1;


            $proeso = Proceso::find($id);
            $alumno = Alumno::find($proeso->id);
            $persona = Persona::find($alumno->persona);

            $preguntas = Pregunta::where('categoria',$categoria)->get();




            return view('app.entrevista.index',['preguntas'=>$preguntas,'persona_a'=>$persona]);

            //dd($preguntas);


    }


    public function switchtipo($pregunta){
        $tipo = $pregunta->tipo;
        switch ($tipo){
            case '1':
                $this->tipo_uno($pregunta);
                break;
            case '2':

                break;
            case '3':

                break;
            case '4':

                break;
        }
    }

    public function tipo_uno($pregunta){
        echo $pregunta->txt;
    }

}
