@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{asset('admin/palabras-claves')}}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-users fa-sm "></i> Listado de palabras claves</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registrar nuevo grupo</h6>
        </div>
        <div class="card-body">
            <form action="{{asset('admin/palabras-claves/'.$keyWord->id)}}" method="post">
                @csrf
                @method('put')
                @include('admin.keywords.form')
                <button class="btn btn-outline-primary btn-sm"><span class="fas fa-plus-circle"></span> Actualizar</button>
            </form>
        </div>
    </div>
@stop