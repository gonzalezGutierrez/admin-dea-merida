<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Rol;
use App\Models\Zona;
use Illuminate\Support\Facades\DB;
use App\Mail\NotifyStatus;

use Mail;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function zonasActivas(Request $request)
    {
        //El usuario se obtiene con el Auth
        $user = auth()->user();
        $user = User::find($user->id);
        $zonas_id = DB::table('groups_zonas')->where('grupo_id', $user->grupo_id)->pluck('zona_id');
        $zonas = Zona::find($zonas_id);
        return $zonas;
    }

    public function NotifyUserStatus(Request $request)
    {
        try{
            $user = User::find($request->user_id);
            $user->estatus = "activo";
            $user->save();
            Mail::to($user->email)->send(new NotifyStatus);
            return ["message"=>'Mensaje enviado'];
        }catch(\Exception $e){
            return $e;
        }
        //El usuario se obtiene con el Auth
        
    }

    public function store(Request $request){

        try{
            $user = new User();
            $request['rol_id'] = Rol::promotor()->id;
            $request['estatus'] = 'inactivo';
            $user->add($request->all());
            return response()->json(['msg'=>'Fuiste registrado correctamente']);
        }catch(\Exception $e){
            return $e;
        }

    }


    
    public function update( Request $request)
    {
        try{
            $user_auth = auth()->user();
            $user = new User();
            $user->getUserWithId($user_auth->id)->edit($request->all());
            // $user = new User();
            // $request['rol_id'] = Rol::promotor()->id;
            // $request['estatus'] = 'activo';
            // $user->edit($request->all());
            return response()->json(['msg'=>'Fuiste editado correctamente'],200);
        }catch(\Exception $e){
            return $e;
        }
    }
}
