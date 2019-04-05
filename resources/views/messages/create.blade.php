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
		@include('messages.form',['message' => new App\Message])

	</form>
	@endif

@stop