<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;
use DB;

class Completos extends Controller
{
    //

    public function index(){

        $results = DB::select( "SELECT * from cendi ");

        $grupos = [];

        foreach ($results as $r){

            //echo "SELECT * from cendi_2.grupos g inner join cendi_2.grupo_ciclo gc on gc.grupo = g.id where g.cendi =  $r->id ";
            $s = DB::select( DB::raw("SELECT * from grupos g where g.cendi =  $r->id ") );

            $grupos[$r->id] = $s;

        }

        // dd($results);

        return view('app.asigna.index_3',['data'=>$results,'grupos'=>$grupos]);

    }

    public function show($id){
        $procesos = Proceso::where('grupo',$id)->where('estado',5)->get();
        return view('inscripciones.indexcendi',['alumnos'=>$procesos]);


    }
}
