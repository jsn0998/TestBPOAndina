@extends('layout')

@section('title','Crear usuario')

@section('content')
	<h1> Editar usuario </h1>

	@if($errors->any())
	<div class="alert alert-danger">
		<h6>Por favor corrige los errores de abajo:</h6>
		<!-- <ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul> -->
	</div>
	@endif

	<form method="POST" action='{{ url("/usuarios/$user->id") }}'>
		{{ method_field('PUT') }}
		{!! csrf_field() !!}

		<label for="name">Nombre:</label>
		<input type="text" name="name" id="name" placeholder="Joseph" value="{{ old('name', $user->name) }}">
		@if($errors->has('name'))
			<p>{{ $errors->first('name') }}</p>
		@endif
		<br>

		<label for="email">Correo electronico:</label>
		<input type="email" name="email" id="email" placeholder="joe@hotmail.com" value="{{ old('email',$user->email) }}">
		@if($errors->has('email'))
			<p>{{ $errors->first('email') }}</p>
		@endif
		<br>

		<label for="password">Contraseña:</label>
		<input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">
		@if($errors->has('password'))
			<p>{{ $errors->first('password') }}</p>
		@endif
		<br>

		<button type="submit">Actualizar usuario</button>
	</form>
@endsection