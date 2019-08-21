<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaAutorizadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_autorizada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('persona')->nullable();
            $table->foreign('persona')->references('id')->on('personas')->onDelete('set null');
            $table->string('parentesco');
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
        Schema::dropIfExists('persona_autorizada');
    }
}
