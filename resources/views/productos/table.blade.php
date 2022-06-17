<div class="table-responsive-sm">
    <table class="table table-striped" id="productos-table">
        <thead>
        <tr>
            <th>#</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Estado</th>
        <th colspan="3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $productos)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $productos->tip_descripcion }}</td>
            <td>{{ $productos->pas_nombre }}</td>
            <td>{{ $productos->pas_descripcion }}</td>
            <td>{{ $productos->pas_precio }}$</td>
            @if($productos->pas_estado==1)
            <td>Activo</td>
            @else
            <td>InActivo</td>
            @endif
                <td>
                    {!! Form::open(['route' => ['productos.destroy', $productos->pas_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productos.edit', [$productos->pas_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>