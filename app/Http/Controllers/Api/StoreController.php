<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Action;
use App\Models\Brand;
use App\Models\Zona;



class StoreController extends Controller
{
    public function index($zonaID)
    {

        $zona = Zona::findOrFail($zonaID);

        $tiendas = Store::where('zona_id',$zona->id)->select('id','nombre')->get();
        return response()->json(['Stores'=>$tiendas],200);
    }


    public function todasLasAcciones(Request $request)
    {
        $action = Action::all();
        return response()->json(['actions'=>$action],200);
    }


    public function todasLasMarcas(Request $request)
    {
        $brands = Brand::all();
        return response()->json(['brands'=>$brands],200);
    }
}
