<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',32);
            $table->string('numero_tienda',20);
            $table->enum('estatus',['activo','inactivo'])->default('activo');
            $table->integer('chain_id')->unsigned();

            $table->foreign('chain_id')->references('id')->on('chains');

            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')->references('id')->on('zonas');

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
        Schema::dropIfExists('stores');
    }
}
