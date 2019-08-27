<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConyugeToTrabajadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajadores', function (Blueprint $table) {
            //
            $table->unsignedInteger('conyuge');
            $table->foreign('conyuge')->references('id')->on('conyuge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajadores', function (Blueprint $table) {
            //
        });
    }
}
