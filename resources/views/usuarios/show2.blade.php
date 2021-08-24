<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Detalle de usuario {{ $user->id }}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1, maximum-scale=1"/>
	</head>
	<body>
		<header>
			<h1>Usuario # {{ $user->id }}</h1>
		</header>

		<section>
			<p>Nombre del usuario: {{ $user->name }}</p>
			<p>Correo del usuario: {{ $user->email }}</p>
			<!-- <p><a href="{{ url('/usuarios') }}">Regresar</a> -->
			<!-- <p><a href="{{ url()->previous() }}">Regresar</a> -->
			<!-- <p><a href="{{ action('UserController@index') }}">Regresar</a> -->
			<a href="{{ route('users.index') }}" >Ver detalle</a>
		</section>

		<footer>
		</footer>
	</body>
</html> 