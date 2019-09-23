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
            $table->string('documentoA')->nullable();
            $table->string('documentoB')->nullable();
            $table->string('documentoC')->nullable();
            $table->string('documentoD')->nullable();
            $table->string('documentoE')->nullable();
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
