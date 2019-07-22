<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Estado;
use App\Persona;
use Illuminate\Http\Request;
use DateTime;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$p = Persona::create([
            'nombre' => "Juan",
            'appaterno' => "Sanchez",
            'apmaterno' => "Trejo",
            'fechanac' => "12-09-1996",
            'lugarnac' => "CDMX",
            'estadocivil' => "1",
            'curp' => "SATJ960722HMCNRN06",
            'gruposan' => "O+"
        ]);


        $p->direccion()->create([
            'calle'=>"Norte 3A",
            'num_int'=>"4922",
            'num_ext'=>"2",
            'colonia'=>"Panamerica",
            'municipio'=>"GAM",
            'estado'=>"CDMX",
            'cp'=>"07770"
        ]);*/






        return view('index.index');
    }

    public function requisitos(){
        return view('index.requisitos');
    }
    public function save(){


        dd(response()->all());

        return "";
    }

    public function preregistro(){

        $estados = Estado::all();

        return view('index.preregistro',['estados'=>$estados]);
    }




}
