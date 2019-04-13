@extends('layouts.master')

@section('contenido')
	<form method="POST" action="division">
		{{ csrf_field() }}
		<div class="input-group mb-1">
  			<div class="input-group-prepend">
    			<label class="input-group-text" for="inputGroupSelect01">Options</label>
  			</div>

			<select class="custom-select" id="division" name="division">
	  			@foreach ($divisiones as $id => $nombre)
   					<option value="{{ $id }}"> {{ $nombre }} </option>
 	  			@endforeach
			</select>
		</div>
		<div class="input-group mb-1">
  			<div class="input-group-prepend">
    			<label class="input-group-text" for="inputGroupSelect01">Options</label>
  			</div>

		<select class="custom-select" id="area" name="area">
		</select>
		</div>
		<input type="submit" name="Submit">
	</form>

@endsection