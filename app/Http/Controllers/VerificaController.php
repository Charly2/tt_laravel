<?php

namespace App\Http\Controllers;

use App\Prevalidacion;
use Illuminate\Http\Request;

class VerificaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:cocendi');
    }


    public function index(){
        $totales = [Prevalidacion::where('estado',1)->get()->count(),Prevalidacion::where('estado',2)->get()->count(),Prevalidacion::where('estado',3)->get()->count()];
        $validas =  Prevalidacion::where('estado',1)->get();
        return view('app.verificapreregistro.index',['validas'=>$validas,'itemactive'=>1,'totales'=>$totales]);

    }

    public function cancelados(){
        $totales = [Prevalidacion::where('estado',1)->get()->count(),Prevalidacion::where('estado',2)->get()->count(),Prevalidacion::where('estado',3)->get()->count()];
        $validas =  Prevalidacion::where('estado',3)->get();
        return view('app.verificapreregistro.index',['validas'=>$validas,'itemactive'=>3,'totales'=>$totales]);

    }

    public function aprobados(){
        $totales = [Prevalidacion::where('estado',1)->get()->count(),Prevalidacion::where('estado',2)->get()->count(),Prevalidacion::where('estado',3)->get()->count()];
        $validas =  Prevalidacion::where('estado',2)->get();
        return view('app.verificapreregistro.index',['validas'=>$validas,'itemactive'=>2,'totales'=>$totales]);

    }



    public function valida($id){
        $valida =  Prevalidacion::find($id);
        $persona =  $valida->persona();




        return view('app.verificapreregistro.valida',['valida'=>$valida,'persona'=>$persona,"notificacion"=>0]);
    }

    public function ver($id){
        $valida =  Prevalidacion::find($id);
        $persona =  $valida->persona();
        //dd($valida);
        return view('app.verificapreregistro.valida',['valida'=>$valida,'persona'=>$persona,"notificacion"=>0]);
    }


    public function validapost($id){
        $prereg = Prevalidacion::find($id);
        $persona = $prereg->persona();






        $prereg->estado = 2;
        $prereg->save();





        return view('app.verificapreregistro.valida',['valida'=>$prereg,'persona'=>$persona,"notificacion"=>1]);

    }

    public function rechaza($id){
        $prereg = Prevalidacion::find($id);
        $persona = $prereg->persona();
        /*print_r($prereg);
        print_r($persona);*/

        $prereg->estado = 3;
        $prereg->save();

        return view('app.verificapreregistro.valida',['valida'=>$prereg,'persona'=>$persona,"notificacion"=>2]);

    }





}
