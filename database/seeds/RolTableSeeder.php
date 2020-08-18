<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new \App\Models\Rol();
        $rol->nombre = 'administrador';
        $rol->save();

        $rol = new \App\Models\Rol();
        $rol->nombre = 'promotor';
        $rol->save();

    }
}
