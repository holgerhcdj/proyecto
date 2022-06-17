<!-- Fac Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fac_id', 'Fac Id:') !!}
    {!! Form::number('fac_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fade Detalle Trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fade_detalle_trabajo', 'Fade Detalle Trabajo:') !!}
    {!! Form::text('fade_detalle_trabajo', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Fade Valor Servicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fade_valor_servicio', 'Fade Valor Servicio:') !!}
    {!! Form::text('fade_valor_servicio', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Fade Descuento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fade_descuento', 'Fade Descuento:') !!}
    {!! Form::text('fade_descuento', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Fade Valor Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fade_valor_total', 'Fade Valor Total:') !!}
    {!! Form::text('fade_valor_total', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('facturaDetalles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
