<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Conyuge;
use App\Persona;
use App\PersonaAuth;
use App\Proceso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class Genera extends Controller
{
    //

    function randomDateInRange() {
        $startDate = Carbon::create(2014,8,1);
        $endDate   = Carbon::create(2015,5,1);

        $randomDate = Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d');
        return $randomDate;
    }

    public function reins_a(){
        $pro = Proceso::all();
        foreach ($pro as $p ){
            $per =  Persona::find(Alumno::find($p->alumno)->persona);
            $p->anterior = $this->setnivel2020($per->fechanac);
            $p->save();
            echo $p->id."---".$per->fechanac. " ---" .$p->nivel. " ---" .$p->anterior. " ---" ;
            //echo $this->setnivel($per->fechanac);



            echo "<br>";
        }
    }


    public function nivel(){
        echo "aqi";
      /*$pro = Proceso::all();
        $i = 1;
        foreach ($pro as $p ){
            if ($i >= 1050 && $i <= 1200){

            $per =  Persona::find(Alumno::find($p->alumno)->persona);
            $per->fechanac = $this->randomDateInRange();
            $per->save();
                echo $p->id."---".$per->fechanac. " ---" .$p->nivel. " ---" ;
            echo $per->fechanac;
                echo "<br>";
            }


            $i++;

        }*/


        $pro = Proceso::all();
        foreach ($pro as $p ){
            $per =  Persona::find(Alumno::find($p->alumno)->persona);
            $p->nivel = $this->setnivel($per->fechanac);
            $p->save();
            echo $p->id."---".$per->fechanac. " ---" .$p->nivel. " ---" ;
            //echo $this->setnivel($per->fechanac);



            echo "<br>";
        }




    }

    public function setnivel($d){
        $da = explode('-',$d);
        if (count($da) == 1){
            die();
        }
        $din = Carbon::create($da[0],$da[1],$da[2]);

        if ($din->between(Carbon::create(2019,2,1),Carbon::create(2018,8,1))){
            return 1;
        }
        if ($din->between(Carbon::create(2018,8,1),Carbon::create(2018,1,1))){
            return 2;
        }
        if ($din->between(Carbon::create(2018,1,1),Carbon::create(2017,8,1))){
            return 3;
        }
        if ($din->between(Carbon::create(2017,8,1),Carbon::create(2016,8,1))){
            return 4;
        }
        if ($din->between(Carbon::create(2016,8,1),Carbon::create(2015,5,1))){
            return 5;
        }
        if ($din->between(Carbon::create(2015,5,1),Carbon::create(2014,8,1))){
            return 6;
        }

    }
    public function setnivel2020($d){
        $da = explode('-',$d);
        if (count($da) == 1){
            die();
        }
        $din = Carbon::create($da[0],$da[1],$da[2]);

        if ($din->between(Carbon::create(2020,2,1),Carbon::create(2019,8,1))){
            return 1;
        }
        if ($din->between(Carbon::create(2019,8,1),Carbon::create(2019,1,1))){
            return 2;
        }
        if ($din->between(Carbon::create(2019,1,1),Carbon::create(2018,8,1))){
            return 3;
        }
        if ($din->between(Carbon::create(2018,8,1),Carbon::create(2017,8,1))){
            return 4;
        }
        if ($din->between(Carbon::create(2017,8,1),Carbon::create(2016,5,1))){
            return 5;
        }
        if ($din->between(Carbon::create(2016,5,1),Carbon::create(2015,8,1))){
            return 6;
        }if ($din->between(Carbon::create(2015,5,1),Carbon::create(2014,8,1))){
            return 100;
        }

    }

    public function show($id){

        error_reporting(1);
        echo $id;
        $trabajadores = \App\Trabajador::where('id',$id)->get();


        foreach ($trabajadores as $tr){


            $ptr = \App\Persona::find($tr->persona);




            /*$url = "https://uinames.com/api/?region=Mexico&ext";
            $response = file_get_contents($url);
            $response = json_decode($response);*/
            $g = ['M','H'];
            $p1 = \App\Persona::create([
                'nombre' =>$ptr->nombre." Jr",
                'appaterno' => $ptr->appaterno,
                'apmaterno'=> $ptr->apmaterno,
                'fechanac' => "00/00/0000",
                'lugarnac' => $ptr->lugarnac,
                'estadocivil' => null,
                'curp' => "AAAA000000XXXXXX00",
                'email'=>null,
                'gruposan' => $ptr->gruposan,
                'direccion' =>null,
                'genero'=>$g[rand(0,1)]
            ]);

            $alumno = \App\Alumno::create([
                'persona' => $p1->id
            ]);


           /* $url = "https://uinames.com/api/?region=Mexico&ext";
            $response2 = file_get_contents($url);
            $response2 = json_decode($response2);
            $g = $response2->gender=="female"?'M':'H';*/
            $p2 =  \App\Persona::create([
                'nombre' =>$ptr->nombre." Sr",
                'appaterno' => $ptr->appaterno,
                'apmaterno'=> $ptr->apmaterno,
                'fechanac' => "00/00/0000",
                'lugarnac' => $ptr->lugarnac,
                'estadocivil' => null,
                'curp' => "AAAA000000XXXXXX00",
                'email'=>null,
                'gruposan' => $ptr->gruposan,
                'direccion' =>null,
                'genero'=>$g[rand(0,1)]
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
            $p3 =  \App\Persona::create([
                'nombre' =>$ptr->nombre." Segundo",
                'appaterno' => $ptr->appaterno,
                'apmaterno'=> $ptr->apmaterno,
                'fechanac' => "00/00/0000",
                'lugarnac' => $ptr->lugarnac,
                'estadocivil' => null,
                'curp' => "AAAA000000XXXXXX00",
                'email'=>null,
                'gruposan' => $ptr->gruposan,
                'direccion' =>null,
                'genero'=>$g[rand(0,1)]
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
                'trabajador' => $tr->id,
                'nivel'=>0
            ]);
            $proceso->documentoA  = "doc_A.jpg";
            $proceso->documentoB  = "doc_B.pdf";
            $proceso->documentoC  = "doc_C.pdf";

            $proceso->cendiopcion = rand(1,6);
            $proceso->estado = 1;
            $proceso->nivel = 0;


            $proceso->alumno = $alumno->id;
            $proceso->persona_autorizada = $perauth->id;

            $proceso->grupo = rand(0,22);
            $proceso->save();

            $tr->conyuge = $conyuge->id;
            $tr->save();


            echo "OK";






        }




    }
}
