@extends('layouts.master')

@section('contenido')
	<select  id="division" name="division">
	  @foreach ($divisiones as $id => $nombre)
   		<option value="{{ $id }}"> {{ $nombre }} </option>
 	  @endforeach
	</select>
	<select  placeholder="Selecciona" id="area" name="area">
	</select>

@endsection