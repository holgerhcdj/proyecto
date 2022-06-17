<!-- Tip Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tip_descripcion', 'Descripcion:') !!}
    {!! Form::text('tip_descripcion', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Tip Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tip_estado', 'Estado:') !!}
    {!! Form::select('tip_estado',['1'=>'Activo','0'=>'Inactivo'],null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tipos.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
