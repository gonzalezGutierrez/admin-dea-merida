<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Report;
use App\Models\User;


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
}