@extends('layout')

@section('contenido')
	<h1>Saludos a {{ $nombre }}</h1>

	<ul>
		@foreach ($consolas as $consola)
			<li>{{ $consola }}</li>
		@endforeach
	</ul>
@stop