<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitFormController extends Controller
{
    public function newVisitForm(Request $request)
    {   
        try{
            $value = $request->getContent();
            $user = auth()->user();
            $name = "report.pdf";
            view()->share('data',$results);
            $pdf = PDF::loadView('PDF.pdf');
            $pdf->save($name);
            Mail::to($user->email)
            ->send(new \App\Mail\VisitFormMail($name));
        }catch (\Exception $e){
            // alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            // return back();
            return $e->getMessage();
        }
    }
}
