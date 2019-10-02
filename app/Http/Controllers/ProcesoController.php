<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Cendi;
use App\Conyuge;
use App\Direccion;
use App\Documentos_trabajador;
use App\Estado;
use App\Persona;
use App\PersonaAuth;
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

    public function index()
    {
        return view('proceso.index');
    }

    public function inicia()
    {




        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $persona = Persona::find($trabajador->persona);

        $pro = Session::get('proceso');



        if ($pro) {
            $proceso = Proceso::find(\Session::get('proceso'));
        } else {

            $proceso = Proceso::create([
                'trabajador' => $trabajador->id
            ]);

            Session::put('proceso', $proceso->id);
        }

        Session::save();


        return redirect('/procesoinscripcion/menor');
    }


    public function menor()
    {
        $pro = Session::get('proceso');
        $proceso = Proceso::find($pro);
        if ($proceso->alumno) {
            return redirect('/procesoinscripcion/conyuge');
        }


        $estados = Estado::all();
        $grupssan = ['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+', 'AB-'];
        return view('proceso.menor', ['estados' => $estados, "gruposan" => $grupssan]);
    }


    public function menorpost()
    {
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

        return redirect('/procesoinscripcion/conyuge');



    }

    public function conyuge()
    {
        $trabajador = Auth::user()->getTrabajador();
        if ($trabajador->conyuge) {
            return redirect('/procesoinscripcion/conyuge_direccion');
        }
        $estados = Estado::all();
        $grupssan = ['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+', 'AB-'];
        return view('proceso.conyuge', ['estados' => $estados, "gruposan" => $grupssan]);

    }


    public function conyugepost()
    {

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

        $trabajador = Auth::user()->getTrabajador();
        if ($trabajador->conyuge) {
            return redirect('/procesoinscripcion/conyuge_direccion');
        }

        $conyuge = Conyuge::create([
            'persona' => $persona->id
        ]);
        $conyuge->save();



        $trabajador->conyuge = $conyuge->id;
        $trabajador->save();



        return redirect('/procesoinscripcion/conyuge_direccion');
    }



    public function conyuge_direccion(){

        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $conyuge = Conyuge::find($trabajador->conyuge);
        $persona = Persona::find($conyuge->persona);

       if($persona->direccion ){
           return redirect('/procesoinscripcion/persona_auth');
       }



        return view('proceso.info_direccion');
    }


    public function conyuge_direccion_post(){


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
        $conyuge = Conyuge::find($trabajador->conyuge);
        $persona = Persona::find($conyuge->persona);

        $direccion = Direccion::create($data);
        $persona->direccion = $direccion->id;
        $persona->save();





        return redirect('/procesoinscripcion/persona_auth');



    }



    public function persona_auth(){
        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);

        if ($proceso->persona_autorizada) {
            return redirect('/procesoinscripcion/persona_auth_direccion');
        }

        $estados = Estado::all();
        $grupssan = ['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+', 'AB-'];
        $parentesco = ['PADRASTRO','TIO','ABUELO','PRIMO','OTRO'];
        return view('proceso.persona', ['estados' => $estados, "gruposan" => $grupssan,'parentesco'=>$parentesco]);

    }

    public function persona_auth_post(){

        $data = request()->validate([
            'nombre' => 'required',
            "appaterno" => "required",
            "apmaterno" => "required",
            "lugarnac" => "required",
            "fechanac" => "required",
            "curp" => "required",
            "genero" => "required",
            "gruposan" => "required",
            "parentesco" => "required",

        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            "appaterno.required" => "El campo apellido paterno es obligatorio",
            "apmaterno.required" => "El campo apellido materno es obligatorio",
            "lugarnac.required" => "El campo lugar de nacimiento es obligatorio",
            "fechanac.required" => "El campo fecha de nacimiento es obligatorio",
            "curp.required" => "El campo curp es obligatorio",
            "genero.required" => "El campo genero es obligatorio",
            "gruposan.required" => "El campo de grupo sanguíneo es obligatorio",
            "parentesco.required" => "El campo de parentesco es obligatorio",
        ]);





        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);

        if ($proceso->persona_autorizada) {
            return redirect('/procesoinscripcion/persona_auth_direccion');
        }






        $persona = Persona::create($data);
        $perauth = PersonaAuth::create([
            'persona' => $persona->id,
            'parentesco' => $data['parentesco']
        ]);



        $proceso->persona_autorizada = $perauth->id;
        $proceso->save();











        return redirect('/procesoinscripcion/persona_auth_direccion');




    }



    public function persona_auth_direccion(){

        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);
        $persona_auth = PersonaAuth::find($proceso->persona_autorizada);
        $persona = Persona::find($persona_auth->persona);


        if($persona->direccion ){
            return redirect('/procesoinscripcion/documentos');
        }



        return view('proceso.info_direccion_pa');

    }

    public function persona_auth_direccion_post(){
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




        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);
        $persona_auth = PersonaAuth::find($proceso->persona_autorizada);
        $persona = Persona::find($persona_auth->persona);
        if($persona->direccion ){
            return redirect('/procesoinscripcion/documentos');
        }

        $direccion = Direccion::create($data);
        $persona->direccion  = $direccion->id;
        $persona->save();









        return redirect('/procesoinscripcion/documentos');

    }


    public function documentos(){
        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);



        if ($proceso->valida()){
            return redirect('/procesoinscripcion/cendi');
        }
        return view('proceso.info_documentos');
    }

    public function documentos_post(){



        $data = request()->validate([
                'docA'=>'required',
                'docB'=>'required',
                'docC'=>'required',

            ]
        );

        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);



        if ($proceso->valida()){
            return redirect('/procesoinscripcion/cendi');
        }


        $path = storage_path('app/trabajadores/') . $trabajador->id.'/'.$pro;
        $exists = file_exists($path);
        if (!$exists) {
            mkdir($path, 0777);
        }









        foreach ($data as $key=> $da){
            $cla = substr($da, -1);
            $fileExt = request()->file($key)->getClientOriginalName();
            $fileName = pathinfo($fileExt, PATHINFO_FILENAME);
            $Ext = request()->file($key)->getClientOriginalExtension();
            $fileToStore = $key . '.' . $Ext;
            switch ($key){
                case 'docA':
                    $proceso->documentoA = $fileToStore = $key . '.' . $Ext;
                    break;
                case 'docB':
                    $proceso->documentoB = $fileToStore = $key . '.' . $Ext;
                    break;
                case 'docC':
                    $proceso->documentoC = $fileToStore = $key . '.' . $Ext;
                    break;
            }



            move_uploaded_file($_FILES[$key]["tmp_name"], $path . '/' . $fileToStore);

        }


        $proceso->save();



        return redirect('/procesoinscripcion/cendi');

    }

    public function cendi(){
        $data = Cendi::all();

        //dd();
        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $pro = Session::get('proceso');



        $proceso = Proceso::find($pro);

        //dd($proceso);


        if ($proceso->cendiopcion){
            Session::forget('proceso');
            Session::save();
            return redirect('/inscripciones');
        }
        return view('proceso.cendi',['data'=>$data]);
    }




    public function cendi_post(){
        $data = request()->validate([
            'cendi' => 'required'

        ], [
            'cendi.required' => 'Debes selecionar un cendi que sea de tu preferencía',
        ]);




        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        $pro = Session::get('proceso');

        $proceso = Proceso::find($pro);


        if ($proceso->cendiopcion){
            return redirect('/inscripciones');
        }

        $proceso->cendiopcion = $data['cendi'];
        $proceso->estado = 1;
        $proceso->save();




        return redirect('/inscripciones');

    }


}
