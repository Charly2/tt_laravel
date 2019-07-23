<?php

use App\Centro;
use Illuminate\Database\Seeder;
use App\Estado;

class CentraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Centro::create(['nombre'=> 'ESCOM']);
        Centro::create(['nombre'=> 'ESIA']);
        Centro::create(['nombre'=> 'UPIITA']);
        Centro::create(['nombre'=> 'ESIME']);
        Centro::create(['nombre'=> 'CET 1']);
        Centro::create(['nombre'=> 'CECYT 9']);







    }
}
