<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ubication;
use App\Models\Visita;
use App\Models\Brand;
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
            // $group = $this->group->add($request->all());
            for($i = 0; $i<count($brands); $i++){
                $MarcaDeVisita = new MarcaDeVisita();
                $MarcaDeVisita->visita_id =  $visita->id;
                $MarcaDeVisita->marca_id = $brands[$i];
                array_push($pila,Brand::find($brands[$i])->products);
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
            return response()->json(['msg'=>'Visita registrada correctamente',"Marca"=>$pila]);
        }catch(\Exception $e){
            DB::rollback();
            // alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return $e;
        }
        return $request;
        
    }
}
