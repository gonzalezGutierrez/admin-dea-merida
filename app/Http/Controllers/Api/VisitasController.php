<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ubication;
use App\Models\Visita;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Product;
use App\Models\Keyword;
use App\Models\MarcaDeVisita;
use App\Models\AccionDeVisita;
use Illuminate\Support\Facades\DB;



class VisitasController extends Controller
{
    public function setVisita(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $ubication = Ubication::create(["latitud"=>$request->latitud,"longitud"=>$request->longitud]);
            $visita = Visita::create(["user_id"=>$user->id,"tienda_id"=>$request->tienda_id,"ubication_id"=> $ubication->id,"terminado"=>false]);
            $actions = $request->actions;
            $brands = $request->brands;
            $pila = array();
            $sentencia= "SELECT * FROM products WHERE brand_id = ";
            $count = count($brands);
            for($i = 0; $i<count($brands); $i++){
                if($count == 1){
                    $sentencia = $sentencia.$brands[$i];
                    break;
                }
                if($i == 0){
                    $sentencia = $sentencia.$brands[$i];
                }else{
                    $sentencia = $sentencia." OR ".$brands[$i];
                }
            }
            $productos = DB::select($sentencia);
            for($i = 0; $i<count($brands); $i++){
                $MarcaDeVisita = new MarcaDeVisita();
                $MarcaDeVisita->visita_id =  $visita->id;
                $MarcaDeVisita->marca_id = $brands[$i];
                $MarcaDeVisita->save();
            }
            for($i = 0; $i<count($actions); $i++){
                $AccionDeVisita = new AccionDeVisita();
                $AccionDeVisita->visita_id =  $visita->id;
                $AccionDeVisita->accion_id = $actions[$i];
                $AccionDeVisita->save();
            }
            
            DB::commit();
                // alert()->success('Grupo registrado correctamente', '');  
            return response()->json(['msg'=>'Visita registrada correctamente',"productos"=>$productos,"visita_id"=>$visita->id,"zona_id"=>Store::find($request->tienda_id)->id]);
        }catch(\Exception $e){  
            DB::rollback();
            // alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return $e;
        }
        return $request;
        
    }
}
