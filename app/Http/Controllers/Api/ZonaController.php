<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

    public function index()
    {
        $zonas = Zona::getZonas('activo')->get();
        return response()->json(['data'=>$zonas]);
    }
    public function show($id)
    {
        //
    }
}
