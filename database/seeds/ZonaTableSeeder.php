<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $zona->slug = Str::slug($zona->nombre);
        $zona->save();
    }
}
