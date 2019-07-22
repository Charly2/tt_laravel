<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Estado;
use App\Persona;
use App\Prevalidacion;
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




        $data = request()->validate([
            'nombre' => 'required',
            "appaterno" => "required",
            "apmaterno" => "required",
            "lugarnac" => "required",
            "fechanac" => "required",
            "curp" => "required",
            "genero" => "required",
            "edocivil" => "required",
            "foto_pre" => "",

        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            "appaterno.required" => "El campo apellido paterno es obligatorio",
            "apmaterno.required" => "El campo apellido materno es obligatorio",
            "lugarnac.required" => "El campo lugar de nacimiento es obligatorio",
            "fechanac.required" => "El campo fecha de nacimiento es obligatorio",
            "curp.required" => "El campo curp es obligatorio",
            "genero.required" => "El campo genero es obligatorio",
            "edocivil.required" => "El campo estado civil es obligatorio"
        ]);


        $persona = Persona::create($data);

        $prevalid = Prevalidacion::create([
            'persona' => $persona->id,
            'estado' => 1
        ]);

        


        if (request()->hasFile('foto_pre')){
            $fileExt = request()->file('foto_pre')->getClientOriginalName();
            $path = storage_path('app\pre_valid/').$prevalid->id;
            $fileName = pathinfo($fileExt,PATHINFO_FILENAME);
            //$prevalid->doc =$fileName;

            $Ext = request()->file('foto_pre')->getClientOriginalExtension();

            $exists = file_exists($path);
            if (!$exists){
                print_r($path);
                mkdir($path, 0777);
            }
            $fileToStore = 'prevalid_'.$prevalid->id.'.'.$Ext;

            move_uploaded_file($_FILES["foto_pre"]["tmp_name"], $path.'/'.$fileToStore);



        }
        $prevalid->save();

        dd($data);




        return "";
    }

    public function preregistro(){

        $estados = Estado::all();

        return view('index.preregistro',['estados'=>$estados]);
    }




}
