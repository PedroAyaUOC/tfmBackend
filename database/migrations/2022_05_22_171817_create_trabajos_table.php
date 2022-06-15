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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->date('fEntrada');
            $table->string('expediente', 10);
            $table->string('descripcion', 100);
            $table->longText('observaciones', 500)->nullable();
            $table->string('coordenadaX', 10)->nullable();
            $table->string('coordenadaY', 10)->nullable();
            $table->string('refCatastro', 20)->nullable();
            $table->string('direccion', 100);

            $table->unsignedSmallInteger('idMunicipio');
            $table->unsignedTinyInteger('idTipo');
            $table->unsignedSmallInteger('idCliente');

            $table->foreign('idMunicipio')->references('id')->on('municipios');
            $table->foreign('idTipo')->references('id')->on('tipo_trabajos');
            $table->foreign('idCliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
};
