<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(proceso::class);
        $this->call(GruposSeeder::class);


        /*$this->call(EstadosSeeder::class);
        $this->call(CentraSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NotificaionSeeder::class);
        $this->call(CendiSeeder::class);
        $this->call(MainSeeder::class);*/

    }
}
