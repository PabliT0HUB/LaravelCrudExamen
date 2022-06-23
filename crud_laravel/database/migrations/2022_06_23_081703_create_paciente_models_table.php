<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_models', function (Blueprint $table) {
            $table->id();
            $table->integer('documento');
            $table->string('tipoDocumento', 15);
            $table->string('nombres',25);
            $table->string('apellidos', 30);
            $table->string('direccion', 20);
            $table->integer('telefono');
            $table->string('genero', 1);
            $table->date('fechaNacimiento', 20);
            $table->string('estadoCivil', 1);
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
        Schema::dropIfExists('paciente_models');
    }
};
