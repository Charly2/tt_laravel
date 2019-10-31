<?php

use App\Grupo;
use Illuminate\Database\Seeder;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
/*
        for ($i = 1 ; $i<= 5; $i++){
            foreach (['Lactantes','Maternales','Preescolares'] as $j){
                foreach (['A','B'] as $k){
                    Grupo::create([
                        'nombre' => $j." ".$k,
                        'next' => 0,
                        'cupo' => 30 ,
                        'cendi' => $i,
                        'nivel' => 0

                    ]);
                }
            }
        }*/





    }
}
