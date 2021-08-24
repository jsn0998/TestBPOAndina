<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1, maximum-scale=1"/>
	</head>
	<body>
		<header>
			<h1>{{ $title }}</h1>
			<hr>
		</header>
			
		<section>

				<ul>
					@forelse($users as $user)
						<li>
							{{ $user->name }}, {{ $user->email }}
							<!-- <a href="{{ url('/usuarios/'.$user->id) }}" >Ver detalle</a> -->
							<!-- <a href='{{ url("/usuarios/{$user->id}") }}' >Ver detalle</a> -->
							<!-- <a href="{{ action('UserController@show',['id'=>$user->id]) }}" >Ver detalle</a> -->
							<a href="{{ route('users.show',['id'=>$user->id]) }}" >Ver detalle</a>
						</li>
					@empty
						<p> No hay usuarios registrados </p>
					@endforelse
				</ul>
		</section>

		<footer>
		</footer>
	</body>
</html> 