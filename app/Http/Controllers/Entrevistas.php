<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Entrevista;
use App\Persona;
use App\Pregunta;
use App\Proceso;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;
use Symfony\Component\VarDumper\VarDumper;

class Entrevistas extends Controller
{
    //

    public function index(){



        $pros = Proceso::all();

        return view('inscripciones.indexcendi_entrevista',['alumnos'=>$pros]);

    }



    public function print($id){
        $alumno = Alumno::findOrFail($id);
        $persona = Persona::findOrFail($alumno->persona);
        $proceso = Proceso::where('alumno',$alumno->id)->get()->first();
        $entre = Entrevista::where('proceso',$proceso->id)->get()->first();
        $categoria = $entre->categoria;


        $preguntas = DB::table('respuestas')
            ->join('preguntas', 'respuestas.pregunta', '=', 'preguntas.id')
            ->select('preguntas.txt','preguntas.tipo','respuestas.resp')
            ->get();


        //dd($preguntas);

        if ($entre->estado!=2){
            return redirect('/entrevistas');
        }
        return view('app.entrevista.print_index',['preguntas'=>$preguntas,'persona_a'=>$persona,'cat'=>$categoria,'id'=>$id]);
    }



    public function llena($id)
    {






            //$proeso = Proceso::find($id);
            $alumno = Alumno::findOrFail($id);
        $proceso = Proceso::where('alumno',$alumno->id)->get()->first();

        $entre = Entrevista::where('proceso',$proceso->id)->get()->first();
        $categoria = $entre->categoria;
            $persona = Persona::findOrFail($alumno->persona);

            $preguntas = Pregunta::where('categoria',$categoria)->get();




        if ($entre->estado==2){
            return redirect('/entrevistas');
        }



            return view('app.entrevista.index',['preguntas'=>$preguntas,'persona_a'=>$persona,'cat'=>$categoria,'id'=>$id]);

            //dd($preguntas);


    }


    public function llena_post(){







        $data = request()->all();

        $proceso = Proceso::where('alumno',$data['id'])->get()->first();

        $entre = Entrevista::where('proceso',$proceso->id)->get()->first();

        if ($entre->estado==2){
            return redirect('/entrevistas');
        }


        foreach ($data as $key=>$d){
            $pos = strpos($key, 'opc');
            if ($pos!==false){
                $k = explode('_',$key);
               $v = Respuesta::create([
                    'pregunta'=> $k[1],
                    'resp'=> $d.", ".$data['cp_'.$k[1]],
                    'entrevista'=> $entre->id,
                ]);


               // VarDumper::dump($v);
            }

        }

        $v = Respuesta::create([
            'pregunta'=> 1,
            'resp'=> $data['comentario'],
            'entrevista'=> $entre->id,
        ]);

        $rdd = $data['res']=='ok'?2:3;
        $entre->estado=$rdd;
        $entre->save();

        return redirect('/entrevistas');

    }

}
