<?php

namespace App\Http\Controllers;

use App\Notificion;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    //

    public function get_ajax(){
        $n = Notificion::limit(4)->get();
        return view('notificaciones.listar',['noti'=>$n]);
    }


    public function index(){
        $n = Notificion::limit(10)->get();
        return view('notificaciones.notificiones_all',['noti'=>$n]);
    }
}
