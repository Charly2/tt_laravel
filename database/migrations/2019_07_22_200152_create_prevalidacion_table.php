<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrevalidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prevalidacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('persona')->nullable();
            $table->foreign('persona')->references('id')->on('personas')->onDelete('set null');
            $table->string('doc')->nullable();
            $table->string('num_emp')->nullable();
            $table->string('ct')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('prevalidacion');
    }
}
