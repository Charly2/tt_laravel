<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' =>"Juan Carlos", 'email'=>"a1@gmail.com",'rol'=>'cocendi', 'password'=> bcrypt('qwer1234'),
        ]);
        User::create([
            'name' =>"Evelin Cedeño", 'email'=>"a2@gmail.com",'rol'=>'trabajador', 'password'=> bcrypt('qwer1234'),
        ]);
    }
}
