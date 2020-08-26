<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->integer('visita_id')->unsigned();
            $table->boolean("exhibido");
            $table->boolean("agotado");
            $table->boolean("cumple_panorama");
            $table->boolean("tiene_promocion");
            $table->boolean("cuenta_con_exhibicion_adicional");
            $table->integer("frentes");
            $table->integer("inventario");
            $table->integer("en_transito");
            $table->date("fecha_caducidad");
            $table->float("precio_piso_venta");
            $table->text("comentarios");
            $table->text("tiene_promocion_texto");
            $table->text("exhibicion_adicional_text");
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('visit_forms');
    }
}
