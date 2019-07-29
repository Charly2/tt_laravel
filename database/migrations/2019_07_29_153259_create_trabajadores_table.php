<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numtrabajador')->nullable();
            $table->string('sueldomensual')->nullable();
            $table->string('horasalida')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('puesto')->nullable();
            $table->string('horaentrada')->nullable();
            $table->string('centrodetrabajo')->nullable();
            $table->string('telefonooficina')->nullable();
            $table->string('extencionoficina')->nullable();
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
        Schema::dropIfExists('trabajadores');
    }
}
