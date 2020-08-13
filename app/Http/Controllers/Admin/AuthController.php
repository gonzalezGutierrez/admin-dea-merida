<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller{

    public function __construct()
    {
        $this->user = new User();
    }
    public function login()
    {
        return view('auth.login');
    }
    public function auth(AuthRequest $request)
    {
        $credentials = $request->only(['email','password']);
        $logged = $this->user->auth($credentials);
        if($logged)
            return redirect('/admin/usuarios');
        return back()->withErrors(['email'=>trans('auth.failed')])->withInputs(request('email'));
    }
    public function logout()
    {
        $this->user->logout();
        return redirect('/login');
    }

}
