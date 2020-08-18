<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Rol;

use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        $status = $user->status;
        if($status=="inactivo"){
            return response()->json([
                'message' => 'No se encontro usuario o ha sido eliminado'
            ],401);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }

        $token = $user->createToken('users')->accessToken;

        return response()->json(['success' => true, 'token' => $token],
        200);

        //return $user->createToken('Auth Token')->accessToken;
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        return response()->json(['res' => true, 'message' => "Hasta luego"],200);
    }


    public function info_user(Request $request)
    {
        $user = auth()->user();
        return response()->json(['res' => true, 'user' => $user],200);
    }


    public function register(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', "min:8", 'confirmed'],
            'telefono' => ['required'],
            'grupo_id' => ['required']
        ]);

        if(User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'grupo_id' => $request->grupo_id,
            'rol_id' => Rol::promotor()->id,
            'estatus' => "activo"
        ])){
            return ["message" => "Creado correctamente"];
        }
    }

}
