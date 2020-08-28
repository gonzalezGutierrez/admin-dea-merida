@extends('layouts.admin')
@section('content')

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
                        <th>Tienda</th>
                        <th>Ver reporte</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visitas as $visit)
                        <tr>
                            <td>{{ $visit->user->nombre }} {{ $visit->user->apellido }}</td>
                            <td>{{$visit->tienda->nombre}}</td>
                            <td>
                                <a href="{{asset('admin/reporte/'.$visit->id)}}" class="btn btn-outline-info btn-sm"><span class="fas fa-edit"></span> Ver </a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
