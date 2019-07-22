<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno');
            $table->string('fechanac');
            $table->string('lugarnac');
            $table->string('estadocivil')->nullable();
            $table->string('curp');
            $table->string('genero');
            $table->string('gruposan')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_cel')->nullable();
            $table->string('email')->nullable();
            $table->integer('escolaridad')->nullable();
            //$table->integer('direccion')->nullable();

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
