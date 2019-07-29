<?php

use App\Notificion;
use Illuminate\Database\Seeder;

class NotificaionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se valido tus documentos'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se activo tu cuenta'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se valido tus documentos'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se activo tu cuenta'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se valido tus documentos'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se valido tus documentos'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se valido tus documentos'
        ]);
        Notificion::create([
            'usuario'=>1,'tipo'=>1,'url'=>'/verificapreregistro','estado'=>'0','mensaje' => 'Se activo tu cuenta'
        ]);



    }
}
