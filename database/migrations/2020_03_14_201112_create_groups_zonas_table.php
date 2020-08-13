<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_zonas', function (Blueprint $table) {

            $table->id();
            $table->integer('zona_id')->unsigned();
            $table->integer('grupo_id')->unsigned();

            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('grupo_id')->references('id')->on('groups');

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
        Schema::dropIfExists('groups_zonas');
    }
}
