<?php

use App\Cendi;
use App\Direccion;
use Illuminate\Database\Seeder;

class CendiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $dir = Direccion::create([
            'calle'  => "IPN",
            'num_int'  => "1",
            'num_ext'  => "0",
            'colonia'  => "IPN",
            'municipio'  => "IPN",
            'estado'  => "IPN",
            'cp' => "00000"

        ]);

        Cendi::create([
            'nombre'=>"Amalia Solorzano de Cardenas" ,
            "telefono"=>"55555555" ,
            "directora"=>"Directora de Amalia" ,
            "direccion"=>$dir->id

        ]);
    }
}
