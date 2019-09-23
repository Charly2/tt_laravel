<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Estado;
use App\Persona;
use App\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProcesoController extends Controller
{
    //


    /**
     * ProcesoController constructor.
     */
    public function __construct()
    {
        $this->middleware('infocomplete');
        $this->middleware('validadocs');
    }

    public function index(){
        return view('proceso.index');
    }

    public function inicia()
    {


        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = Persona::find($trabajador->persona);

        $pro = Session::get('proceso');

        if ($pro){
            $proceso = Proceso::find(\Session::get('proceso'));
        }else{

            $proceso = Proceso::create([
                'trabajador' => $trabajador->id
            ]);

            Session::put('proceso', $proceso->id);
        }

        Session::save();



        return redirect('/procesoinscripcion/menor');
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


        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);



        $persona = Persona::create($data);



        $alumno = Alumno::create([
            'persona' => $persona->id
        ]);
        $alumno->save();


        $proceso->alumno = $alumno->id;
        $proceso->save();

        dd($persona);






        dd($data);
        echo "aa";
    }



}
