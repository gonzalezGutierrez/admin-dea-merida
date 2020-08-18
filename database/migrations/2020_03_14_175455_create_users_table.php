<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100)->unique();
            $table->string('password',255);
            $table->enum('estatus',['activo','inactivo'])->default('inactivo');
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->string('telefono',13);

            $table->integer('grupo_id')->unsigned();
            $table->integer('rol_id')->unsigned()->default(1);

            $table->foreign('grupo_id')->references('id')->on('groups');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
