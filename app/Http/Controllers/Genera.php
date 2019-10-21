<?php

namespace App\Http\Controllers;

use App\Conyuge;
use App\PersonaAuth;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class Genera extends Controller
{
    //

    public function show($id){

        error_reporting(1);
        echo $id;
        $trabajadores = \App\Trabajador::where('id',$id)->get();


        foreach ($trabajadores as $tr){


            $ptr = \App\Persona::find($tr->persona);




            $url = "https://uinames.com/api/?region=Mexico&ext";
            $response = file_get_contents($url);
            $response = json_decode($response);
            $g = $response->gender=="female"?'M':'H';
            $p1 = \App\Persona::create([
                'nombre' =>$response->name,
                'appaterno' => $ptr->appaterno,
                'apmaterno'=> $ptr->apmaterno,
                'fechanac' => "00/00/0000",
                'lugarnac' => $ptr->lugarnac,
                'estadocivil' => null,
                'curp' => "AAAA000000XXXXXX00",
                'email'=>null,
                'gruposan' => $ptr->gruposan,
                'direccion' =>null,
                'genero'=>$g
            ]);

            $alumno = \App\Alumno::create([
                'persona' => $p1->id
            ]);


            $url = "https://uinames.com/api/?region=Mexico&ext";
            $response2 = file_get_contents($url);
            $response2 = json_decode($response2);
            $g = $response2->gender=="female"?'M':'H';
            $p2 = \App\Persona::create([
                'nombre' =>$response2->name,
                'appaterno' => $response2->surname,
                'apmaterno'=> $response->surname,
                'fechanac' => $response2->birthday->dmy,
                'lugarnac' => $ptr->lugarnac,
                'estadocivil' => 'Casado',
                'curp' => "AAAA000000XXXXXX00",
                'email'=> $response2->email,
                'gruposan' => $ptr->gruposan,
                'direccion' =>null,
                'genero'=>$g
            ]);

            $conyuge = Conyuge::create([
                'persona' => $p2->id
            ]);

            $dir = \App\Direccion::find($ptr->direccion);

            $di1 = \App\Direccion::create([
                'calle' => $dir->calle  ,
                'num_int' => $dir->num_int  ,
                'num_ext' => $dir->num_ext  ,
                'colonia' => $dir->colonia  ,
                'municipio' => $dir->municipio ,
                'estado' => $dir->estado  ,
                'cp'  => $dir->cp
            ]);

            $p2->direccion = $di1->id;
            $p2->save();


            $edoci = ['Soltero','Casado'];

            $url = "https://uinames.com/api/?region=Mexico&ext";
            $response3 = file_get_contents($url);
            $response3 = json_decode($response3);
            $g = $response3->gender=="female"?'M':'H';
            $p3 = \App\Persona::create([
                'nombre' =>$response3->name,
                'appaterno' => $ptr->appaterno,
                'apmaterno'=> $response3->surname,
                'fechanac' => $response3->birthday->dmy,
                'lugarnac' => $ptr->lugarnac,
                'estadocivil' => $edoci[rand(0,1)],
                'curp' => "AAAA000000XXXXXX00",
                'email'=> $response3->email,
                'gruposan' => $ptr->gruposan,
                'direccion' =>null,
                'genero'=>$g
            ]);


            $di2 = \App\Direccion::create([
                'calle' => $dir->calle  ,
                'num_int' => $dir->num_int  ,
                'num_ext' => $dir->num_ext  ,
                'colonia' => $dir->colonia  ,
                'municipio' => $dir->municipio ,
                'estado' => $dir->estado  ,
                'cp'  => $dir->cp
            ]);

            $p3->direccion = $di2->id;
            $p3->save();


            $parentesco = ['TIO','PRIMO','OTRO'];
            $perauth = PersonaAuth::create([
                'persona' => $p3->id,
                'parentesco' => $parentesco[rand(0,2)]
            ]);



            $proceso = \App\Proceso::create([
                'trabajador' => $tr->id
            ]);
            $proceso->documentoA  = "doc_A.jpg";
            $proceso->documentoB  = "doc_B.pdf";
            $proceso->documentoC  = "doc_C.pdf";

            $proceso->cendiopcion = rand(1,6);
            $proceso->estado = 1;


            $proceso->alumno = $alumno->id;
            $proceso->persona_autorizada = $perauth->id;
            $proceso->save();


            echo "OK";

            VarDumper::dump($proceso);




        }




    }
}
