<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitForm;


class VisitFormController extends Controller
{
    public function newVisitForm(Request $request)
    {   
        try{
            $data = $request->all()['data'];
            $VisitFormData = ["product_id"=>$data["producto_id"],"visita_id"=>$data["visita_id"],"exhibido"=>$data["exhibido"],
            "agotado"=>$data["agotado"],"cumple_panorama"=>$data["cumple_panorama"],"tiene_promocion"=>$data["tiene_promocion"],
            "cuenta_con_exhibicion_adicional"=>$data["cuenta_con_exhibicion_adicional"],"frentes"=>$data["frentes"],
            "inventario"=>$data["inventario"],"en_transito"=>$data["en_transito"],"fecha_caducidad"=>$data["fecha_caducidad"],
            "precio_piso_venta"=>$data["precio_piso_venta"],"comentarios"=>$data["comentarios"],"tiene_promocion_texto"=>$data["tiene_promocion_texto"],
            "exhibicion_adicional_text"=>$data["exhibicion_adicional_text"]];
            $VisitForm = VisitForm::create($VisitFormData);
            return response()->json(['visita_id'=>$data["visita_id"] ],201);
            // $user = auth()->user();
            // $name = "report.pdf";
            // view()->share('data',$results);
            // $pdf = PDF::loadView('PDF.pdf');
            // $pdf->save($name);
            // Mail::to($user->email)
            // ->send(new \App\Mail\VisitFormMail($name));
        }catch (\Exception $e){
            // alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            // return back();
            return response()->json(['error'=>$e->getMessage()],404);
        }
    }
}
