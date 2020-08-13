<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Estatus</label>
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],$store->estatus,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Nombre de la tienda</label>
            {!!Form::text('nombre',$store->nombre,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Zona</label>
            {!! Form::select('zona_id',$zonas,$store->zona_id,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Numero de la tienda</label>
            {!!Form::text('numero_tienda',$store->numero_tienda,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Cadena de la tienda</label>
            {!! Form::select('chain_id',$chains,$store->chain_id,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
</div>
