<?php

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

        Grupo::create([
            'nombre'=>'',
            'cupo'=>30,

        ]);
    }
}
