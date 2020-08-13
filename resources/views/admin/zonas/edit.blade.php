@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{asset('admin/zonas')}}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-route fa-sm "></i> Listado de zonas</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Actualizar zona</h6>
        </div>
        <div class="card-body">
            <form action="{{asset('admin/zonas/'.$zona->id)}}" method="post">
                @csrf
                {{method_field('put')}}
                @include('admin.zonas.form.form')
                <button class="btn btn-outline-primary btn-sm"><span class="fas fa-edit"></span> Actualizar</button>
            </form>
            <hr>
            <form action="{{asset('admin/zonas/'.$zona->id)}}" method="post" class="form-inline-block @if($zona->estatus == 'inactivo') display-none @endif">
                @csrf
                <input type="hidden" name="DESTROY_ACTION" value="true">
                {{method_field('delete')}}
                <button type="submit" class="btn btn-sm btn-outline-danger"> <span class="fas fa-trash"></span> Eliminar</button>
            </form>
            <form action="{{asset('admin/zonas/'.$zona->id)}}" method="post" class="form-inline-block @if($zona->estatus == 'inactivo') display-none @endif">
                @csrf
                <input type="hidden" name="DESTROY_ACTION" value="false">
                {{method_field('delete')}}
                <button type="submit" class="btn btn-sm btn-outline-danger"> <span class="fas fa-trash"></span> Dar de baja</button>
            </form>
        </div>
    </div>

@stop
