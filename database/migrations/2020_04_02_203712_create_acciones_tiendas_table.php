<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionesTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acciones_tiendas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('visita_id')->unsigned();
            $table->foreign('visita_id')->references('id')->on('visitas');

            $table->integer('accion_id')->unsigned();
            $table->foreign('accion_id')->references('id')->on('acciones');

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
        Schema::dropIfExists('acciones_tiendas');
    }
}
