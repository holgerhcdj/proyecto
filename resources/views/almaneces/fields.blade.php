<!-- Pas Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pst_razon_social', 'Razon Social:') !!}
    {!! Form::text('pst_razon_social', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Pas Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pst_rep_legal', 'Representante Legal:') !!}
    {!! Form::text('pst_rep_legal', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Pas Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pst_direccion', 'Direccion:') !!}
    {!! Form::text('pst_direccion', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Pas Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pst_telefono', 'Teléfono:') !!}
    {!! Form::text('pst_telefono', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productos.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
