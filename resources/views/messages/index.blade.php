@extends('layout')

@section('contenido')
	<h1>Mensajes todos</h1>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensaje</th>
				<th>Nota</th>
				<th>Etiquetas</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($messages as $message)
				<tr>
					<td>{{ $message->id }}</td>
					@if ($message->user_id)
						<td><a href="{{ route('usuarios.show', $message->user_id) }}">{{ $message->user->name }}</a>  </td>
						<td>{{ $message->user->email }}</td>
					@else
						<td>{{ $message->nombre }}</td>
						<td>{{ $message->email }}</td>
					@endif
					<td><a href="{{ route('mensajes.show', $message->id ) }}">{{ $message->mensaje }}</a></td>
					<td>{{ $message->note->body ?? '' }}</td>
					<td>{{ $message->tags->pluck('name')->implode(', ') ?? '' }}</td>

					<td>
						<a class="btn btn-info btn-sm" href="{{ route('mensajes.edit', $message->id ) }}">Editar</a>
						<form style="display:inline" method="POST" action="{{ route('mensajes.destroy', $message->id) }}">
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