<?php

namespace App\Http\Controllers;

use App\Proceso;
use App\Result;
use App\Trabajador;
use App\User;
use Illuminate\Http\Request;
use DB;
class AsignacionController extends Controller
{
    //

    public function index(){

        $results = DB::select( DB::raw("SELECT * from cendi where id in (select cendi from result where anio = 2019 group by cendi)") );







       // dd($results);

        return view('app.asigna.index_2',['data'=>$results]);
    }


    public function show($id){
        $lug = 5;

        $res  = Result::where('cendi',$id)->orderBy('result')->get();
        $a = [];$b=[];

        $asig = [];$i=0;$sinasig = [];
        foreach ($res as $key => $item) {
            if ($i < $lug){

                $aux = $res->pull($key);
                $asig[] =$aux;

                $a[] = Proceso::find($aux->proceso);
            }else{
                $aux = $res->pull($key);
                $sinasig[] =$aux;
                $b[] = Proceso::find($aux->proceso);

            }
            $i++;
        }




        //dd(User::where('entidad',Trabajador::find(1)->id)->where('rol','trabajador')->get()->first()->id);

        return view('app.asigna.index',['si'=>$asig,'no'=>$sinasig,'num'=>$lug,'a'=>$a,'b'=>$b]);

    }
}
