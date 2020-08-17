<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class PassportController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }
    public function login(Request $request)
    {
        // $credentials = $request->only(['email','password']);
        // $logged = $this->user->auth($credentials);
        // return ["asd"=>$logged];
        // if($logged)
        //     return "Logueado";
        // return "error";
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

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
        $request->user()->tokens()->delete();
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
            'rol_id' => 1,
            'estatus' => "activo"
        ])){
            return ["message" => "Creado correctamente"];
        }
    }

}
