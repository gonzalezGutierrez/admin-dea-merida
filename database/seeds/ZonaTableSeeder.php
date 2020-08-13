<?php

use Illuminate\Database\Seeder;

class ZonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zona = new \App\Models\Zona();
        $zona->nombre = 'Monterrey';
        $zona->save();
    }
}
