<!-- Tip Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tip_id', 'Tipo de producto:') !!}
    {!! Form::select('tip_id', $tipos,null, ['class' => 'form-control']) !!}
</div>

<!-- Pas Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pas_nombre', 'Nombre del producto:') !!}
    {!! Form::text('pas_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Pas Receta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pas_descripcion', 'Descripcion del producto:') !!}
    {!! Form::textarea('pas_descripcion', null, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Pas Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pas_precio', 'Precio:') !!}
    {!! Form::number('pas_precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Pas Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pas_estado', 'Estado:') !!}
    {!! Form::select('pas_estado',['1'=>'Activo','0'=>'Inactivo'],null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productos.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
