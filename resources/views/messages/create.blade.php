@extends('layout')

@section('contenido')
	<h1>Mis contactos</h1>
	<h2>Escríbeme</h2>
	@if ( session()->has('info') )
		<h3>{{ session('info') }}</h3>
	@else
		{{-- expr --}}
	<form method="POST" action=" {{ route('mensajes.store') }}">
		{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
		<!--esto es mejor-->
		{{ csrf_field() }}
		@if (auth()->guest())
			<p><label for="nombre">
				Nombre
				<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
				{!! $errors->first('nombre','<span class=error>:message</span>') !!}
			</label></p>
			<p><label for="email">
				email
				<input class="form-control" type="email" name="email" value="{{ old('email') }}">
				{!! $errors->first('email','<span class=error>:message</span>') !!}
			</label></p>
		@endif
		<p><label for="mensaje">
			Mensaje
			<textarea class="form-control" name="mensaje">{{ old('mensaje') }}</textarea>
			{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
		</label></p>
		<input class="btn btn-primary" type="submit" value="Enviar">

	</form>
	@endif

@stop