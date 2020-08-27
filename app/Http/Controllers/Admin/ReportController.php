<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MarcaDeVisita;
use App\Models\AccionDeVisita;
use App\Models\Action;
use App\Models\Visita;
use App\Models\User;


class ReportController extends Controller
{
    public function show($id)
    {
        $visita = Visita::find($id);       
        
        $marcas = MarcaDeVisita::where("visita_id",$visita->id)->get();
        $acciones = AccionDeVisita::where("visita_id",$visita->id)->get();
        $correo = ["nombre"=>$visita->user->nombre." ".$visita->user->apellido,"tienda_nombre"=>$visita->tienda->nombre,"tienda_numero"=>$visita->tienda->numero_tienda,
        "ciudad"=>"Tuxtla","estado"=>"Chiapas","cadena"=>$visita->tienda->cadena->nombre,"fecha"=>$visita->created_at,'marcas'=>Brand::find($marcas->map->only(['marca_id'])) ,'acciones'=>Action::find($acciones->map->only(['accion_id']))];
        return view('admin.reports.report',['correo'=>$correo]);
    }
}
