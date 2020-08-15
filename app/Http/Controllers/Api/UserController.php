<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Support\Facades\DB;


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
        $user = User::find($request->user_id);
        $zonas_id = DB::table('groups_zonas')->where('grupo_id', $user->grupo_id)->pluck('zona_id');
        $zonas = Zona::find($zonas_id);
        return $zonas;
    }
    




    public function store(Request $request)
    {
        try{
            $user = new User();
            $user->add($request->all());
            return response()->json(['msg'=>'Fuiste registrado correctamente']);
        }catch(\Exception $e){
            return $e;
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
