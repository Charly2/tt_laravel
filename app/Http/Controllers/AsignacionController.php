<?php

namespace App\Http\Controllers;

use App\Result;
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


        $asig = [];$i=0;$sinasig = [];
        foreach ($res as $key => $item) {
            if ($i < $lug){
                $asig[] = $res->pull($key);
            }else{
                $sinasig[] = $res->pull($key);

            }
            $i++;
        }





        return view('app.asigna.index',['si'=>$asig,'no'=>$sinasig,'num'=>$lug]);

    }
}
