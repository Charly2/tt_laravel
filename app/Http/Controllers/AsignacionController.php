<?php

namespace App\Http\Controllers;

use App\Proceso;
use App\Result;
use App\Trabajador;
use App\User;
use Illuminate\Http\Request;
use DB;
use Symfony\Component\VarDumper\VarDumper;

class AsignacionController extends Controller
{
    //

    public function index(){

        $results = DB::select( DB::raw("SELECT * from cendi where id in (select cendi from result where anio = 2019 group by cendi)") );

        $grupos = [];

        foreach ($results as $r){

            //echo "SELECT * from cendi_2.grupos g inner join cendi_2.grupo_ciclo gc on gc.grupo = g.id where g.cendi =  $r->id ";
            $s = DB::select( DB::raw("SELECT * from cendi_2.grupos g inner join cendi_2.grupo_ciclo gc on gc.grupo = g.id where g.cendi =  $r->id ") );

            $grupos[$r->id] = $s;

        }






        // dd($results);

        return view('app.asigna.index_2',['data'=>$results,'grupos'=>$grupos]);

    }


    public function show($id){


        $res = DB::select( "select * from cendi_2.proceso  p INNER join cendi_2.`result` r on p.id = r.proceso where p.grupo = $id order by result" );

        $res2 = DB::select( "select *  from grupo_ciclo where  grupo = $id" );



        if ($res2[0]->estado==1){
            return redirect('/asigna_uno');
        }


        $lug = $res2[0]->disponibles;

        //$res  = Result::where('cendi',$id)->orderBy('result')->get();
        $a = [];$b=[];

        $asig = [];$i=0;$sinasig = [];
        foreach ($res as $key => $item) {
            if ($i < $lug){

                $aux = $item;
                $asig[] =$aux;
                $a[] = Proceso::where('alumno',$aux->alumno)->get()[0];

            }else{
                $aux = $item;
                $sinasig[] =$aux;
                $b[] = Proceso::where('alumno',$aux->alumno)->get()[0];

            }
            $i++;
        }

        //dd($a);
        //dd(User::where('entidad',Trabajador::find(1)->id)->where('rol','trabajador')->get()->first()->id);

        return view('app.asigna.index',['si'=>$asig,'no'=>$sinasig,'num'=>$lug,'a'=>$a,'b'=>$b,'id'=>$id]);

    }


    public function actualiza(){

        $data = request()->all();
        $id = $data['id'];

        $res2 = DB::select( "update grupo_ciclo set estado = 1 where  grupo = $id" );

        foreach ($data['data'] as $d ){
            $p = Proceso::find($d);
            $p->cendi = $id;
            $p->estado = 3;
            $p->save();
            print_r($p);
        }





    }
}
