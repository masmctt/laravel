{{-- {{ dd( auth()->user()->roles) }} --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>Document</title>

</head>
<body>
	<header>
		<?php function activeMenu($url){
			return request()->is($url) ? 'active' : '';
		}?>
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
				<li class="nav-item active" class='{{ activeMenu('/') }}' >
					<a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item" class='{{ activeMenu('saludos/*') }}'>
					<a class="nav-link" href="{{ route('saludos','Marco') }}">Saludo</a>
				</li>
				<li class="nav-item" class='{{ activeMenu('mensajes/create') }}'>
					<a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
				</li>
				@if (auth()->check())
					<li class="nav-item">
						<a class="nav-link" class='{{ activeMenu('mensajes') }}' href="{{ route('mensajes.index') }}">Mensajes</a>
					</li>
					{{-- @if (auth()->User()->role === 'admin') --}}
					@if (auth()->User()->hasRoles(['admin']))
						<li class="nav-item">
							<a class="nav-link" class='{{ activeMenu('usuarios') }}' href="{{ route('usuarios.index') }}">Usuarios</a>
						</li>
					@endif
				@endif
			</ul>
		     <ul class="navbar-nav">
				@if (auth()->guest())
					<li class="nav-item">
						<a class="nav-link" class='{{ activeMenu('login') }}' href="/login">login</a>
					</li>
				@else
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        		  {{ auth()->user()->name }}
		        		</a>
		        		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          		<a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
		          		<a class="dropdown-item" href="/logout">Cerrar sesión</a>
			      	</li>

				@endif
		     </ul>
		  </div>
		  </div>
		</nav>




	</header>
	<div class="container-fluid">
		@yield('contenido')
		<footer>Copyright mio {{ date('Y') }}</footer>
	</div>
	<script type="text/javascript" src="/js/app.js"></script>

</body>
</html>