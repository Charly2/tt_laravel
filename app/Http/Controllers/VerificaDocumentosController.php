<?php

namespace App\Http\Controllers;

use App\Documentos_trabajador;
use App\Persona;
use App\Prevalidacion;
use App\Trabajador;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificaDocumentosController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:cocendi');
    }


    public function index(){
        $totales = [Trabajador::where('estado',3)->get()->count(),Trabajador::where('estado',4)->get()->count()];
        $validas =  Trabajador::where('estado',3)->get();
        return view('app.verificadocumentos.index',['validas'=>$validas,'itemactive'=>1,'totales'=>$totales]);

    }

    public function cancelados(){
        $totales = [Trabajador::where('estado',3)->get()->count(),Trabajador::where('estado',4)->get()->count()];
        $validas =  Prevalidacion::where('estado',4)->get();
        return view('app.verificadocumentos.index',['validas'=>$validas,'itemactive'=>2,'totales'=>$totales]);

    }




  
    public function valida($id){
        $valida =  Trabajador::find($id);
        $persona =  $valida->persona();
        $direccion = $persona->direccion();

        //dd($direccion->direccionForm());

        $documentos = Documentos_trabajador::findByTrabajador($valida->id);


        return view('app.verificadocumentos.valida',['valida'=>$valida,'persona'=>$persona,"notificacion"=>0,'dir'=>$direccion,'docs'=>$documentos]);
    }




    public function validapost($id){
        $prereg = Trabajador::find($id);


        $persona = Persona::find($prereg->persona);
        $comentario = request()->all();




        //return view('mails.prueba2',['persona' => $persona]);



        //se envia el mail


        $mail = Mail::send('mails.prueba2',['persona' => $persona],function ($m){
            $m->to('papapitufo10@gmail.com','Juan Carlos')->subject('Prueba de email');
        });






        $prereg->estado = 5;
        $prereg->save();
        return json_encode(['estado'=>1]);


    }

    public function rechaza($id){
        $prereg = Trabajador::find($id);


        $persona = Persona::find($prereg->persona);
        $comentario = request()->input('come');

        //dd($comentario);

        //return view('mails.prueba3',['persona' => $persona,'comentario'=>$comentario]);


        //se envia el mail

        $mail = Mail::send('mails.prueba3',['persona' => $persona,'comentario'=>$comentario],function ($m){
            $m->to('papapitufo10@gmail.com','Juan Carlos')->subject('Prueba de email');
        });

        $prereg->estado = 4;
        $prereg->save();
        return json_encode(['estado'=>1]);




    }





}
