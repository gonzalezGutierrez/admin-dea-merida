<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Report;
use App\Models\User;
use App\Models\Visita;
use App\Models\Brand;
use App\Models\AccionDeVisita;
use App\Models\Action;
use App\Models\MarcaDeVisita;
use Illuminate\Support\Collection;
use App\Http\Resources\ActionsCollection;
use App\Http\Resources\MarcasCollection;




use PDF;
use Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $user = auth()->user();
        $name = "report.pdf";
        // view()->share('data',$results);
        $pdf = PDF::loadView('PDF.pdf');
        $pdf->save($name);
        Mail::to($user->email)
        ->send(new \App\Mail\Report($name));
    }
    
    public function VisitFormMail(Request $request)
    {
        $user = auth()->user();
        $name = "report.pdf";
        view()->share('data',$results);
        $pdf = PDF::loadView('PDF.pdf');
        $pdf->save($name);
        Mail::to($user->email)
        ->send(new \App\Mail\VisitFormMail($name));
    }
    public function ViewFormMail(Request $request)
    {        
        $user = User::find(2);
        $visita = Visita::find(3);
        $marcas = MarcaDeVisita::where("visita_id",$visita->id)->get();
        //return Brand::find($marcas->map->only(['marca_id'])) ;
        $acciones = AccionDeVisita::where("visita_id",$visita->id)->get();
        //return Action::find($acciones->map->only(['accion_id']))->map->only(['accion']);          var_dump(Brand::find($marcas->map->only(['marca_id']))->map->only(['nombre']))        var_dump(Action::find($acciones->map->only(['accion_id']))->map->only(['accion']))
        // return $acciones->only(["id"]);
        // return Action::where("id",$acciones->map->only(['accion_id']))->get();
        $correo = ["nombre"=>$user->nombre." ".$user->apellido,"tienda_nombre"=>$visita->tienda->nombre,"tienda_numero"=>$visita->tienda->numero_tienda,
        "ciudad"=>"Tuxtla","estado"=>"Chiapas","cadena"=>$visita->tienda->cadena->nombre,"fecha"=>$visita->created_at,'marcas'=>Brand::find($marcas->map->only(['marca_id'])),
        'acciones'=>Action::find($acciones->map->only(['accion_id']))];
        return view('email.reporte')->with(['correo'=>$correo]);
    }
}