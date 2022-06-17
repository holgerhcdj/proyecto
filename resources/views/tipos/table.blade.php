<div class="table-responsive-sm">
    <table class="table table-striped" id="tipos-table">
        <thead>
            <tr>
            <th>Descripcion</th>
            <th>Estado</th>
            <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipos as $tipos)
            <tr>
            <td>{{ $tipos->tip_descripcion }}</td>
            @if($tipos->tip_estado==1)
            <td>Activo</td>
            @else
            <td>Inactivo</td>
            @endif
                <td>
                    {!! Form::open(['route' => ['tipos.destroy', $tipos->tip_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipos.edit', [$tipos->tip_id]) }}" class='btn btn-ghost-info'><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>