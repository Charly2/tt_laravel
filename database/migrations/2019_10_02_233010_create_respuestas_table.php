<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pregunta')->nullable();
            $table->foreign('pregunta')->references('id')->on('preguntas')->onDelete('set null');
            $table->string('resp');
            $table->integer('tipo')->nullable();
            $table->integer('categoria')->nullable();
            $table->timestamps();
            $table->unsignedInteger('entrevista')->nullable();
            $table->foreign('entrevista')->references('id')->on('entrevistas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
