<?php

use Illuminate\Database\Seeder;

class GrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = new \App\Models\Group();
        $grupo->nombre = 'Niagara';
        $grupo->save();
    }
}
