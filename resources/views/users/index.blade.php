@extends('layout')

@section('contenido')
	<h1>Usuarios</h1>
	<a class="btn btn-primary" href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Roles</th>
				<th>Notas</th>
				<th>Etiquetas</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						{{ $user->roles->pluck('display_name')->implode(' - ') }}
						{{-- @foreach ($user->roles as $role)
							{{ $role->display_name }}
						@endforeach --}}
					</td>
					<td>{{ $user->note->body ?? '' }}</td>
					<td>{{ $user->tags->pluck('name')->implode(', ') ?? '' }}</td>
					<td>
						<a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $user->id ) }}">Editar</a>
						<form style="display:inline" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form>
					</td>
				</tr>
				{{-- expr --}}
			@endforeach
		</tbody>
	</table>

@stop