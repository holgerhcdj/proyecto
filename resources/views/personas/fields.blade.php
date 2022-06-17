<?php
$pass="";
?>
<!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_cedula', 'Cedula:') !!}
    {!! Form::text('per_cedula', null, ['class' => 'form-control','required'=>'required']) !!}
</div><!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_apellidos', 'Apellidos:') !!}
    {!! Form::text('per_apellidos', null, ['class' => 'form-control','required'=>'required']) !!}
</div><!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_nombres', 'Nombres:') !!}
    {!! Form::text('per_nombres', null, ['class' => 'form-control','required'=>'required']) !!}
</div><!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_direccion', 'Direccion:') !!}
    {!! Form::text('per_direccion', null, ['class' => 'form-control','required'=>'required']) !!}
</div><!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_telefono', 'Telefono:') !!}
    {!! Form::text('per_telefono', null, ['class' => 'form-control','required'=>'required']) !!}
</div><!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_fecha_nacimiento', 'Fecha Nacimiento:') !!}
    {!! Form::date('per_fecha_nacimiento', null, ['class' => 'form-control']) !!}
</div><!-- Flo Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_estado_civil', 'Estado Civil:') !!}
    {!! Form::select('per_estado_civil',
    ['Soltero'=>'Soltero',
    'Casado'=>'Casado',
    'Viudo'=>'Viudo',
    'Divorciado'=>'Divorciado',
    'Unión Libre'=>'Unión Libre'],null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_sexo', 'Sexo:') !!}
    {!! Form::select('per_sexo',['MUJER'=>'MUJER','HOMBRE'=>'HOMBRE'],null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_usuario', 'Usuario:') !!}
    {!! Form::text('per_usuario', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Clave:') !!}
    {!! Form::text('password', $pass, ['class' => 'form-control','required'=>'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('per_tipo', 'Tipo:') !!}
    {!! Form::select('per_tipo',['C'=>'Cliente','A'=>'Administrador','V'=>'Vendedor'],null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personas.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
