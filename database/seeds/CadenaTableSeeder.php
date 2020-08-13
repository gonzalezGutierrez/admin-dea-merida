<?php

use Illuminate\Database\Seeder;

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
    }
}
