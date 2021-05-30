<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbColombiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_colombia', function (Blueprint $table) {
            $table->id();
            $table->string('celular');
            $table->string('fbid');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('genero');
            $table->string('ciudad');
            $table->string('ubicacion');
            $table->string('civil');
            $table->string('trabajo');
            $table->string('fecha');
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
        Schema::dropIfExists('tb_colombia');
    }
}
