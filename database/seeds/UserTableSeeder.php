<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->email = '163174@ids.upchiapas.edu.mx';
        $user->password = 'secret';
        $user->nombre    = 'Jesus';
        $user->apellido  = 'Gonzalez';
        $user->telefono  = "1256766";
        $user->rol_id    = 1;
        $user->grupo_id  = 1;
        $user->save();
    }
}
