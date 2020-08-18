<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Estatus</label>
            {!! Form::select('estatus',['activo'=>'Activo','inactivo'=>'Inactivo'],$user->estatus,['class'=>'form-control form-control-user']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Nombre del usuario</label>
            {!!Form::text('nombre',$user->nombre,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Apellido del usuario</label>
            {!!Form::text('apellido',$user->apellido,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Telefono</label>
            {!!Form::text('telefono',$user->telefono,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Grupo</label>
            {!! Form::select('grupo_id',$grupos,$user->grupo_id,['class'=>'form-control form-control-user','placeholder'=>"Selecciona un grupo"]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="">Rol</label>
            {!! Form::select('rol_id',$roles,$user->rol_id,['class'=>'form-control form-control-user','placeholder'=>"Selecciona el rol"]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Correo electronico</label>
            {!!Form::email('email',$user->email,['class'=>'form-control form-control-user'])!!}
        </div>
    </div>
    @if($edit != true)
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="">Contraseña</label>
                {!!Form::password('password',['class'=>'form-control form-control-user'])!!}
            </div>
        </div>
    @endif
</div>
