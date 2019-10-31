<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Persona;
use App\Proceso;
use App\Result;
use App\Trabajador;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\VarDumper;

class AsignacionController extends Controller
{
    //

    public function index(){

        $results = DB::select( DB::raw("SELECT * from cendi where id in (select cendi from result where anio = 2019 group by cendi)") );

        $grupos = [];

        foreach ($results as $r){

            //echo "SELECT * from cendi_2.grupos g inner join cendi_2.grupo_ciclo gc on gc.grupo = g.id where g.cendi =  $r->id ";
            $s = DB::select( DB::raw("SELECT * from grupos g inner join grupo_ciclo gc on gc.grupo = g.id where g.cendi =  $r->id ") );

            $grupos[$r->id] = $s;

        }






        // dd($results);

        return view('app.asigna.index_2',['data'=>$results,'grupos'=>$grupos]);

    }


    public function show($id){


        $res = DB::select( "select * from proceso  p
    INNER join `result` r
        on p.id = r.proceso
    inner join grupos g
        on p.nivel = g.nivel
where g.id = $id and g.cendi = r.cendi" );

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

        $res2 = Grupo::find($id);

        foreach ($data['data'] as $d ){
            $p = Proceso::find($d);
            $this->send_mail($p);
            $p->grupo = $id;
            $p->cendi = $res2->id;
            $p->estado = 5;
            $p->save();
            print_r($p);
        }


    }


    public function send_mail($proceso){
        $trabajador = \App\Trabajador::find($proceso->trabajador);
        $alum = \App\Alumno::find($proceso->alumno);
        $pt = Persona::find($trabajador->persona);
        $pa = Persona::find($alum->persona);
        $d = DB::select("select *,grupos.nombre as n1 from grupos inner join cendi on grupos.cendi = cendi.id where grupos.id = $proceso->cendi")[0];
        $data['tr'] = $pt->nombrecompleto();
        $data['hi'] = $pa->nombrecompleto();
        $data['ng'] = $d->n1;
        $data['nc'] = $d->nombre;
        //return view('mails.prueba4',$data);
        $mail = Mail::send('mails.prueba4',$data,function ($m){
            $m->to('papapitufo10@gmail.com','Juan Carlos')->subject('Prueba de email');
        });

    }
}
