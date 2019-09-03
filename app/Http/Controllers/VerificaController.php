<?php

namespace App\Http\Controllers;

use App\Prevalidacion;
use App\Trabajador;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


        if ($prereg->estado ==1 ||1){
            $trabajador = Trabajador::create([
                'persona' => $persona->id,
                'numtrabajador'=> $prereg->num_emp,
                'centrodetrabajo'=> $prereg->ct,
                'estado' => 1
            ]);
            $prereg->estado = 2;
            $prereg->save();

            $user = User::create([
                'name' => $persona->nombre , 'email'=>$persona->email,'rol'=>'trabajador', 'password'=> bcrypt($persona->nombre),
            ]);

            $user->entidad = $trabajador->id;

            $user->save();




            $mail = Mail::send('mails.prueba',['persona' => $persona],function ($m){
                $m->to('papapitufo10@gmail.com','Juan Carlos')->subject('Prueba de email');
            });


           //return view('mails.prueba',['persona' => $persona]);


            return json_encode(['estado'=>1]);
        }else{
            return json_encode(['estado'=>0]);
        }



    }

    public function rechaza($id){
        $prereg = Prevalidacion::find($id);
        $persona = $prereg->persona();

        if ($prereg->estado == 1){

            $prereg->estado = 3;
            $prereg->save();
            return json_encode(['estado'=>1]);

        }else{
            return json_encode(['estado'=>0]);
        }


    }





}
