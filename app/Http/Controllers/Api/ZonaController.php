<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Store;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

    public function index()
    {
        $zonas = Zona::where('estatus', '=', 'activo')->paginate(15);
        //$zonas = Zona::getZonas('activo')->get();
        return response()->json(['data'=>$zonas]);
    }
    public function tiendas(Request $request, $slug)
    {
        $zona = Zona::where('slug','=', $slug)->first();
        return  Store::where('zona_id','=',$zona->id)->get();
    }
}
