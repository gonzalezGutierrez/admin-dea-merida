<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Estatus</label>
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],$group->estatus,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Nombre de la zona</label>
            {!!Form::text('nombre',$group->nombre,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
    @foreach($zonas as $zona)
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 mb-4">
            <div class="content">
                <input type="checkbox"   value="{{$zona->id}}" name="zona[]">
                <span class="fas fa-map-marker fa-2x"></span>
                <span>{{$zona->nombre}}</span>
            </div>
        </div>
    @endforeach
</div>
