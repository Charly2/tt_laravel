<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    //


    public function index(){
        return view('proceso.index');
    }


    public function menor (){
        $estados = Estado::all();
        return view('proceso.menor',['estados' => $estados]);
    }



    public function menorpost (){
        echo "aa";
    }



}
