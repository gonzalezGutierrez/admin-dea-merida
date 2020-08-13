<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Estatus</label>
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],$product->estatus,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Nombre del producto</label>
            {!!Form::text('nombre',$product->nombre,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Codigo del producto</label>
            {!!Form::text('codigo',$product->codigo,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Marca</label>
            {!! Form::select('brand_id',$brands,$product->brand_id,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
</div>
