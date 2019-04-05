		{{ csrf_field() }}
		{{-- @if (auth()->guest()) --}}
		{{-- @unless (isset($message) and $message->user_id) en el create mandar message vacio--}}
		{{-- {{ dd(isset($message)) }} --}}
		@unless ($message->user_id)
			{{-- expr --}}
			<p><label for="nombre">
				Nombre
				<input class="form-control" type="text" name="nombre" value="{{ $message->nombre ?? old('nombre') }}">
				{!! $errors->first('nombre','<span class=error>:message</span>') !!}
			</label></p>
			<p><label for="email">
				email
				<input class="form-control" type="email" name="email" value="{{ $message->email ?? old('email') }}">
				{!! $errors->first('email','<span class=error>:message</span>') !!}
			</label></p>
		@endunless
		<p><label for="mensaje">
			Mensaje
			<textarea class="form-control" name="mensaje">{{ $message->mensaje ?? old('mensaje') }}</textarea>
			{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
		</label></p>
		<input class="btn btn-primary" type="submit" value="{{ $btnText ?? 'Guardar' }}">
		{{-- <input class="btn btn-primary" type="submit" value="{{ $btnText ?? 'Guardar' }}"> --}}
		{{-- <input class="btn btn-primary" type="submit" value="{{ isset ($btnText) ? $btnText : 'Guardar' }}"> --}}
