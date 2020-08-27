<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Report;
use App\Models\User;
use App\Models\Visita;



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
        // $user = auth()->user();
        $asd = Visita::find(3);
        return  $asd->tienda->nombre;
        $correo = ["nombre"=>$user->nombre." ".$user->apellido,"tienda_nombre"=>$asd->tienda->nombre];
        $visita_id = 1;
        $tienda = Visita::find(1);
        $user = User::find(2);
        $correo = ["nombre"=>$user->nombre." ".$user->apellido];

        return view('email.reporte');
    }
}