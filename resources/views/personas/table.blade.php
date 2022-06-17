<table class="table">
	<tr>
		<th>#</th>
		<th>Nombres</th>
		<th>Tipo</th>
		<th>Usuario</th>
		<th>Correo</th>
		<th>Estado</th>
		<th>...</th>
	</tr>
	@foreach($personas as $p)
	<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$p->per_apellidos.' '.$p->per_nombres}}</td>
		@if($p->per_tipo=='A')
		<td>Administrador</td>
		@endif
		@if($p->per_tipo=='V')
		<td>Vendedor</td>
		@endif
		@if($p->per_tipo=='C')
		<td>Cliente</td>
		@endif
		<td>{{$p->per_usuario}}</td>
		<td>{{$p->email}}</td>
		@if($p->per_estado==1)
		<td>Activo</td>
		@else
		<td>Inactivo</td>
		@endif
		<td>
			<div class='btn-group'>
				<a href="{{ route('personas.edit', [$p->per_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
			</div>
		</td>
	</tr>
	@endforeach
</table>