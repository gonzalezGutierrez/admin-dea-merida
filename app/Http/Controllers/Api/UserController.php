<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        //
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
