@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/admin/marcas/create" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i> Agregar nuevo</a>
        <form action="{{asset('admin/marcas')}}" class="d-sm-flex align-items-center justify-content-between mb-4">
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],'',['class'=>'form-control form-control-user']) !!}
            <button type="submit" class="btn btn-outline-primary form-control-user"><span class="fas fa-search"></span></button>
        </form>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de marcas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nombre de promotor</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visitas as $visit)
                        <tr>
                            <td>{{ $visit->user->nombre }} {{ $visit->apellido }}</td>
                            <td>{{$visit->terminado}}</td>
                            <td>
                                <a href="" class="btn btn-outline-info btn-sm"><span class="fas fa-edit"></span> Actualiar</a>
                                <form action="" method="post" class="form-inline-block display-none ">
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
