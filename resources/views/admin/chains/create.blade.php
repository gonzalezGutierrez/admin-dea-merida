@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{asset('admin/cadenas')}}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-shopping-basket fa-sm "></i> Listado de cadenas</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registrar nueva cadena</h6>
        </div>
        <div class="card-body">
            <form action="{{asset('admin/cadenas')}}" method="post">
                @csrf
                @include('admin.chains.form.form')
                <button class="btn btn-outline-primary btn-sm"><span class="fas fa-plus-circle"></span> Registrar</button>
            </form>
        </div>
    </div>

@stop
