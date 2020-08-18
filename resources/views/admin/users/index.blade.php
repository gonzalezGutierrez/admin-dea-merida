@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/admin/usuarios/create" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-user-plus fa-sm"></i> Agregar nuevo</a>
        <form action="{{asset('admin/usuarios')}}" class="d-sm-flex align-items-center justify-content-between mb-4">
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],$status,['class'=>'form-control form-control-user']) !!}
            <button type="submit" class="btn btn-outline-primary form-control-user"><span class="fas fa-search"></span></button>
        </form>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios del sistema</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Grupo</th>
                        <th>Rol</th>
                        <th>Telefono</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->grupo->nombre}}</td>
                            <td>{{$user->rol->nombre}}</td>
                            <td>{{$user->telefono}}</td>
                            <td>{{$user->estatus}}</td>
                            <td>
                                <a href="{{asset('admin/usuarios/'.$user->id.'/edit')}}" class="btn btn-outline-info btn-sm"><span class="fas fa-edit"></span> Actualiar</a>
                                <form action="{{asset('admin/usuarios/'.$user->id)}}" method="post" class="form-inline-block @if($user->estatus == 'inactivo') display-none @endif">
                                    @csrf
                                    <input type="hidden" name="DESTROY_ACTION" value="false">
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-sm btn-outline-danger"> <span class="fas fa-trash"></span> Dar de baja</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
