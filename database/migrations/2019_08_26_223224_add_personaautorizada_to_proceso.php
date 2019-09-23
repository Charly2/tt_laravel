<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonaautorizadaToProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proceso', function (Blueprint $table) {
            //
            $table->unsignedInteger('persona_autorizada')->nullable();

        });
        Schema::table('proceso', function (Blueprint $table) {
            //

            $table->foreign('persona_autorizada')->references('id')->on('persona_autorizada');
        });
        Schema::table('proceso', function (Blueprint $table) {
            //

            $table->unsignedInteger('alumno')->nullable();
            $table->foreign('alumno')->references('id')->on('alumno');
            $table->string('ciclo_escolar')->nullable();
            $table->integer('anterior')->nullable();
            $table->integer('estado')->nullable();

            $table->string('obs')->nullable();





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proceso', function (Blueprint $table) {
            //
        });
    }
}
