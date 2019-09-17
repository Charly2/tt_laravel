<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_trabajador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('trabajador')->nullable();
            $table->string('documentoA');
            $table->string('documentoB');
            $table->string('documentoC');
            $table->string('documentoD');
            $table->string('documentoE');
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
        Schema::dropIfExists('documentos_trabajador');
    }
}
