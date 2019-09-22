<?php

namespace App\Http\Controllers;

use App\Direccion;
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





        if(Direccion::find($persona->direccion)){
            return redirect('/completeinformacion_trabajo');
        }



        return view('app.completar_info.info_direccion',['usuario'=>$usuario,'trabajador'=>$trabajador,'persona'=>$persona]);


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

    public function completeinformacion_direccion_post(){



        $data = request()->validate([
            'calle' => 'required',
            "num_int" => "required|digits_between:1,6",
            "num_ext" => "required|digits_between:1,6",
            "cp" => "required|digits_between:4,5",
            "estado" => "required",
            "municipio" => "required",
            "colonia" => "required",


        ], [
            'calle.required' => 'El campo calle es obligatorio',
            "num_int.required" => "El campo número interior es obligatorio",
            "num_ext.required" => "El campo número exterior es obligatorio",
            "cp.required" => "El campo cp es obligatorio",
            "estado.required" => "El campo estado es obligatorio",
            "municipio.required" => "El campo municipio es obligatorio",
            "colonia.required" => "El campo colonia es obligatorio",
            "num_int.digits_between" => "El campo número interior debe ser un número entre 1 y 6 caracteres",
            "num_ext.digits_between" => "El campo número exterior debe ser un número entre 1 y 6 caracteres",
            "cp.digits_between" => "El campo cp debe ser un número entre 4 y 5 caracteres",

        ]);

        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = Persona::find($trabajador->persona);

        $direccion = Direccion::create($data);
        $persona->direccion = $direccion->id;
        $persona->save();






        return redirect('/completeinformacion_trabajo');

    }

    public function completeinformacion_trabajo(){

        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = Persona::find($trabajador->persona);

        if ($trabajador->estado == 2){
            return redirect('/dashboard');
        }

        return view('app.completar_info.info_centrodetrabajo',['usuario'=>$usuario,'trabajador'=>$trabajador,'persona'=>$persona]);

    }


    public function completeinformacion_trabajo_post(){

        $data = request()->validate([
            'puesto' => 'required',
            "ocupacion" => "required",
            "horasalida" => "required",
            "horaentrada" => "required",
            "sueldomensual" => "required|numeric",
            "telefonooficina" => "required|numeric",
            "extencionoficina" => "required|numeric",


        ], [
            'puesto.required' => 'El campo puesto es obligatorio',
            "ocupacion.required" => "El campo ocupacion es obligatorio",
            "horasalida.required" => "El campo hora salida es obligatorio",
            "horaentrada.required" => "El campo hora entrada es obligatorio",
            "sueldomensual.required" => "El campo sueldo mensual es obligatorio",
            "telefonooficina.required" => "El campo teléfono oficina es obligatorio",
            "extencionoficina.required" => "El campo extención oficina es obligatorio",
            "sueldomensual.numeric" => "El campo sueldo mensual debe ser un número",
            "telefonooficina.numeric" => "El campo teléfono oficina debe ser un número ",
            "extencionoficina.numeric" => "El campo extención oficina debe ser un número",

        ]);


        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();


        $trabajador->puesto = $data["puesto"];
        $trabajador->ocupacion = $data["ocupacion"];
        $trabajador->horaentrada = $data["horaentrada"];
        $trabajador->horasalida = $data["horasalida"];
        $trabajador->sueldomensual = $data["sueldomensual"];
        $trabajador->telefonooficina = $data["telefonooficina"];
        $trabajador->extencionoficina = $data["extencionoficina"];
        $trabajador->estado = 2;


        $trabajador->save();



        return redirect('/completeinformacion_documentos');



    }



    public function completeinformacion_documentos(){
        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = Persona::find($trabajador->persona);

        if ($trabajador->estado == 2){
            return redirect('/dashboard');
        }


        
        return view('app.completar_info.info_documentos',['usuario'=>$usuario,'trabajador'=>$trabajador,'persona'=>$persona]);
    }

    public function completeinformacion_documentos_post(){
        dd(request()->validate([
            'docA'=>'required',
            'docB'=>'required',
            'docC'=>'required',
            'docD'=>'required',
            'docE'=>'required'
        ]));
        //dd(request()->file('docA'));
    }


}
