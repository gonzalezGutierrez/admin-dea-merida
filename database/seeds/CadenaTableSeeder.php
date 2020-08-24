<?php

use Illuminate\Database\Seeder;
use App\Models\Action;

class CadenaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cadena = new \App\Models\Chain();
        $cadena->nombre = 'Nueva';
        $cadena->save();


        //despues cambiar
        Action::create(["accion"=>"Acomoda"]);
        Action::create(["accion"=>"Limpieza"]);
        Action::create(["accion"=>"Ajuste de inventario"]);
        Action::create(["accion"=>"Inventario"]);
        Action::create(["accion"=>"Envío a merma"]);
        Action::create(["accion"=>"Relleno de anaquel"]);
    }
}
