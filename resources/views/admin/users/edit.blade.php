@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/admin/usuarios" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Listado de usuarios</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Actualizar datos de usuario</h6>
        </div>
        <div class="card-body">
            <form action="{{asset('admin/usuarios/'.$user->id)}}" method="post">
                @csrf
                {{method_field('put')}}
                @include('admin.users.forms.form',['edit'=>true])
                <button class="btn btn-outline-primary btn-sm"><span class="fas fa-user-edit"></span> Actualizar</button>
            </form>
            <hr>
            <form action="{{asset('admin/usuarios/'.$user->id)}}" method="post" class="form-inline-block @if($user->estatus == 'inactivo') display-none @endif">
                @csrf
                <input type="hidden" name="DESTROY_ACTION" value="true">
                {{method_field('delete')}}
                <button type="submit" class="btn btn-sm btn-outline-danger"> <span class="fas fa-trash"></span> Eliminar</button>
            </form>
            <form action="{{asset('admin/usuarios/'.$user->id)}}" method="post" class="form-inline-block @if($user->estatus == 'inactivo') display-none @endif">
                @csrf
                <input type="hidden" name="DESTROY_ACTION" value="false">
                {{method_field('delete')}}
                <button type="submit" class="btn btn-sm btn-outline-danger"> <span class="fas fa-trash"></span> Dar de baja</button>
            </form>
        </div>
    </div>

@stop
