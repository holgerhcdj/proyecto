<div class="table-responsive-sm">
    <table class="table table-striped" id="facturaDetalles-table">
        <thead>
            <tr>
                <th>Fac Id</th>
        <th>Fade Detalle Trabajo</th>
        <th>Fade Valor Servicio</th>
        <th>Fade Descuento</th>
        <th>Fade Valor Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($facturaDetalles as $facturaDetalles)
            <tr>
                <td>{{ $facturaDetalles->fac_id }}</td>
            <td>{{ $facturaDetalles->fade_detalle_trabajo }}</td>
            <td>{{ $facturaDetalles->fade_valor_servicio }}</td>
            <td>{{ $facturaDetalles->fade_descuento }}</td>
            <td>{{ $facturaDetalles->fade_valor_total }}</td>
                <td>
                    {!! Form::open(['route' => ['facturaDetalles.destroy', $facturaDetalles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('facturaDetalles.show', [$facturaDetalles->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('facturaDetalles.edit', [$facturaDetalles->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>