<div class="table-responsive-sm">
    <table class="table table-striped" id="almaneces-table">
        <thead>
            <tr>
                <th>Razon Social</th>
        <th>Representante Legal</th>
        <th>Direccion</th>
        <th>Telefono</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($almaneces as $almaneces)
            <tr>
                <td>{{ $almaneces->pst_razon_social }}</td>
            <td>{{ $almaneces->pst_rep_legal }}</td>
            <td>{{ $almaneces->pst_direccion }}</td>
            <td>{{ $almaneces->pst_telefono }}</td>
                <td>
                    {!! Form::open(['route' => ['almaneces.destroy', $almaneces->pst_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('almaneces.edit', [$almaneces->pst_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>