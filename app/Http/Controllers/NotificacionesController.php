<?php

namespace App\Http\Controllers;

use App\Notificion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionesController extends Controller
{
    //

    public function get_ajax(){
        $usuario = Auth::user()->id;
        $n = Notificion::where('usuario',$usuario)->limit(4)->get();

        return view('notificaciones.listar',['noti'=>$n]);
    }


    public function index(){
        $usuario = Auth::user()->id;

        $n = Notificion::where('usuario',$usuario)->limit(10)->get();

        return view('notificaciones.notificiones_all',['noti'=>$n]);
    }
}
