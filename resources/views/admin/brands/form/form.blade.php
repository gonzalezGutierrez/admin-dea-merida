<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Estatus</label>
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],$brand->estatus,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Nombre de la marca</label>
            {!!Form::text('nombre',$brand->nombre,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
</div>
