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
        Schema::create('clientes', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('dni', 9);
            $table->string('idioma', 2);
            $table->string('email', 50)->nullable();
            $table->string('telefono1', 10)->nullable();
            $table->string('telefono2', 10)->nullable();
            $table->longText('observaciones', 500)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('cp', 5)->nullable();
            $table->unsignedSmallInteger('idMunicipio');

            $table->foreign('idMunicipio')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
