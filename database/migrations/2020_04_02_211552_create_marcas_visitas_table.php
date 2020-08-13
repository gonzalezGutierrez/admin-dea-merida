<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas_visitas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('brands');

            $table->integer('visita_id')->unsigned();
            $table->foreign('visita_id')->references('id')->on('visitas');

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
        Schema::dropIfExists('marcas_visitas');
    }
}
