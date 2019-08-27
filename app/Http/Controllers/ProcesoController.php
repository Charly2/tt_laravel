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

    public function inicia(){

        //return redirect('/procesoinscripcion/menor');
    }


    public function menor (){
        $estados = Estado::all();
        $grupssan = ['A+','A-','O+','O-','B+','B-','AB+','AB-'];
        return view('proceso.menor',['estados' => $estados,"gruposan"=>$grupssan]);
    }



    public function menorpost (){
        $data = request()->validate([
            'nombre' => 'required',
            "appaterno" => "required",
            "apmaterno" => "required",
            "lugarnac" => "required",
            "fechanac" => "required",
            "curp" => "required",
            "genero" => "required",
            "gruposan" => "required",

        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            "appaterno.required" => "El campo apellido paterno es obligatorio",
            "apmaterno.required" => "El campo apellido materno es obligatorio",
            "lugarnac.required" => "El campo lugar de nacimiento es obligatorio",
            "fechanac.required" => "El campo fecha de nacimiento es obligatorio",
            "curp.required" => "El campo curp es obligatorio",
            "genero.required" => "El campo genero es obligatorio",
            "gruposan.required" => "El campo de grupo sanguíneo es obligatorio",
        ]);


        dd($data);
        echo "aa";
    }



}
