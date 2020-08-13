<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\Rol;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->user = new  User();
    }

    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $users = $this->user->getUsers($status)->get();
        return view('admin.users.index',['users'=>$users]);
    }

    public function create()
    {
        $grupos = Group::pluck('nombre','id');
        $roles = Rol::pluck('nombre','id');
        return view('admin.users.create',['user'=>$this->user,'grupos'=>$grupos,'roles'=>$roles]);
    }

    public function store(UserRequest $request)
    {
        try{
            $this->user->add($request->all());
            alert()->success('Usuario registrado correctamente', 'Optional Title');
            return redirect('/admin/usuarios');
        }catch(\Exception $e){
            alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }

    public function show($idUser)
    {
        $user = $this->user->getUserWithId($idUser);
        return view('admin.users.show',['user'=>$user]);
    }

    public function edit($idUser)
    {
        $grupos = Group::pluck('nombre','id');
        $roles = Rol::pluck('nombre','id');
        $user = $this->user->getUserWithId($idUser);
        return view('admin.users.edit',['user'=>$user,'grupos'=>$grupos,'roles'=>$roles]);
    }

    public function update(Request $request, $idUser)
    {
        try{
            $this->user->getUserWithId($idUser)->edit($request->all());
            alert()->success('Usuario registrado correctamente', 'Optional Title');
            return redirect('/admin/usuarios');
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function destroy(Request $request,$idUser)
    {
        try{
            $user = $this->user->getUserWithId($idUser);
            $helper = new Helper($request->DESTROY_ACTION,$user);
            $helper->optionDestroy();
            return redirect('/admin/usuarios');
        }catch(\Exception $e){
            dd($e);
        }
    }
    private function destroyAction($action,$user){

        switch ($action){

            case "true":
                $user->userDelete();
                break;

            case "false":
                $user->userInactive();
                break;
        }
    }
}
