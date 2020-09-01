<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitImage;
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
            $visita = Visita::create(["user_id"=>$user->id,"tienda_id"=>$request->tienda_id,"terminado"=>false,"ubicacion"=>$request->ubicacion,"latitud"=>$request->latitud,"logitud"=>$request->logitud]);
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
            return response()->json(['msg'=>'Visita registrada correctamente',"productos"=>$productos,"visita_id"=>$visita->id,"zona_id"=>Store::find($request->tienda_id)->zona->id],201);
        }catch(\Exception $e){
            DB::rollback();
            // alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return $e;
        }
    }

    public function uploadFile(Request $request) {
        try {
            $image = $request->image;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'imagenes-visitas/'.time() . '.png';
            VisitImage::create(["visita_id"=>$request->visita_id,"url"=>$imageName]);
            Storage::disk('local')->put($imageName, base64_decode($image));
            return response()->json(["message"=>"Almacenada con exito"],201);
        }catch (\Exception $e) {
            return response()->json("Error al guardar la imagen , Error: ".$e->getMessage(),500);
        }
    }
}
