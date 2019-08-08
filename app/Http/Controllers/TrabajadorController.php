<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrabajadorController extends Controller
{
    //


    /**
     * TrabajadorController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:trabajador');
        //$this->middleware('infocomplete', ['except' => ['completainfo','completainfo_general']]);
    }

    public function completainfo(){

        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = $trabajador->persona();

        if ($persona->validainfogeneral()){
            return redirect('/completeinformacion_direccion');
        }




        $grupssan = ['A+','A-','O+','O-','B+','B-','AB+','AB-'];

       // dd($persona);


        return view('app.completar_info.info_persona',['usuario'=>$usuario,'trabajador'=>$trabajador,'persona'=>$persona,"gruposan"=>$grupssan]);
    }


    public function completeinformacion_direccion(){

        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = $trabajador->persona();




        return "Hola";
    }



    public function othermain(){
        echo "Otra ruta";
    }

    public function completainfo_general(){

        $data = request()->validate([
            'gruposan' => 'required',
            "telefono_fijo" => "required|digits_between:8,10",
            "telefono_cel" => "required|digits_between:8,10"

        ], [
            'gruposan.required' => 'El campo Grupo sanguíneo es obligatorio',
            "telefono_fijo.required" => "El campo Teléfono fijo es obligatorio",
            "telefono_cel.required" => "El campo Teléfono celular es obligatorio",
            "telefono_cel.digits_between" => "El campo Teléfono celular debe ser un número entre 8 y 10 caracteres",
            "telefono_fijo.digits_between" => "El campo Teléfono celular debe ser un número entre 8 y 10 caracteres",

        ]);




        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();


        $persona = Persona::find($trabajador->persona);





        $persona->gruposan=$data['gruposan'];
        $persona->telefono_fijo=$data['telefono_fijo'];
        $persona->telefono_cel=$data['telefono_cel'];

        $persona->save();
        return redirect('/completeinformacion_direccion');

    }


}
