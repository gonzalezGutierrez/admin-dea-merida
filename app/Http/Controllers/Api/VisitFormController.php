<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitForm;
use App\Models\Visita;
use App\Models\MarcaDeVisita;
use App\Models\AccionDeVisita;
use App\Models\Action;
use App\Models\Brand;
use PDF;
use Mail;

class VisitFormController extends Controller
{
    public function newVisitForm(Request $request)
    {   
        try{
            $user = auth()->user();
            $final = $request->all()["final"];
            $data= $request->all()["data"];
            if(!$final){
                $VisitFormData = ["product_id"=>$data["producto_id"],"visita_id"=>$data["visita_id"],"exhibido"=>$data["exhibido"],
                "agotado"=>$data["agotado"],"cumple_panorama"=>$data["cumple_panorama"],"tiene_promocion"=>$data["tiene_promocion"],
                "cuenta_con_exhibicion_adicional"=>$data["cuenta_con_exhibicion_adicional"],"frentes"=>$data["frentes"],
                "inventario"=>$data["inventario"],"en_transito"=>$data["en_transito"],"fecha_caducidad"=>$data["fecha_caducidad"],
                "precio_piso_venta"=>$data["precio_piso_venta"],"comentarios"=>$data["comentarios"],"tiene_promocion_texto"=>$data["tiene_promocion_texto"],
                "exhibicion_adicional_text"=>$data["exhibicion_adicional_text"]];
                $VisitForm = VisitForm::create($VisitFormData);
                return response()->json(['visita_id'=>$data["visita_id"]],201);
            }
            $visita = Visita::find($data["visita_id"]);
            $visita->terminado = true;
            $visita->save();
            $marcas = MarcaDeVisita::where("visita_id",$visita->id)->get();
            $acciones = AccionDeVisita::where("visita_id",$visita->id)->get();
            $correo = ["nombre"=>$user->nombre." ".$user->apellido,"tienda_nombre"=>$visita->tienda->nombre,"tienda_numero"=>$visita->tienda->numero_tienda,
            "ciudad"=>"Tuxtla","estado"=>"Chiapas","cadena"=>$visita->tienda->cadena->nombre,"fecha"=>$visita->created_at,'marcas'=>Brand::find($marcas->map->only(['marca_id'])),
            'acciones'=>Action::find($acciones->map->only(['accion_id']))];
            $name = "report.pdf";
            view()->share('correo',$correo);
            $pdf = PDF::loadView('email.reporte');
            $pdf->save($name);
            Mail::to($user->email)->send(new \App\Mail\VisitFormMail());
            return response()->json(['message'=>"Correo enviado"],200);
        }catch (\Exception $e){
            return $e;
        }
    }
}
