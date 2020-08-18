@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/admin/usuarios" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-user-plus fa-sm "></i> Listado de usuarios</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registrar nuevo usuario</h6>
        </div>
        <div class="card-body">
            <form action="{{asset('admin/usuarios')}}" method="post">
                @csrf
                @include('admin.users.forms.form',['edit'=>false])
                <button class="btn btn-outline-primary btn-sm"><span class="fas fa-user-plus"></span> Registrar</button>
            </form>
        </div>
    </div>

@stop
