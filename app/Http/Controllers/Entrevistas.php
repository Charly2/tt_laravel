<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;

class Entrevistas extends Controller
{
    //



    protected function llena()
    {


            $categoria = 1;

            $preguntas = Pregunta::where('categoria',$categoria)->get();




            return view('app.entrevista.index',['preguntas'=>$preguntas]);

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
