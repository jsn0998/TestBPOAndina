@extends('layout')

@section('title','Crear usuario')

@section('content')

	<div class="card">
		<h2 class="card-header">Crear usuario</h2>

		<div class="card-body">
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

			<form method="POST" action="{{ url('/usuarios/crear') }}">
				{!! csrf_field() !!}

				<div class="form-group">
				    <label for="name">Nombre:</label>
					<input type="text" class="form-control" name="name" id="nombre" placeholder="Jose" value="{{ old('name') }}">
					@if($errors->has('name'))
						<p>{{ $errors->first('name') }}</p>
					@endif
		  		</div>

		  		<div class="form-group">
		  			<label for="email">Correo electronico:</label>
					<input type="email" class="form-control" name="email" id="correo" placeholder="joe@hotmail.com" value="{{ old('email') }}">
					@if($errors->has('email'))
						<p>{{ $errors->first('email') }}</p>
					@endif
		  		</div>


		  		<div class="form-group">
		  			<label for="password">Contraseña:</label>
					<input type="password" class="form-control" name="password" id="clave" placeholder="Mayor a 2 caracteres">
					@if($errors->has('password'))
						<p>{{ $errors->first('password') }}</p>
					@endif
		  		</div>

				<button type="submit" class="btn btn-primary">Crear usuario</button>
				<a href="{{ route('users.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
			</form>
		</div>
	</div>

@endsection

{{-- @push('js')
   <script>

	// $.ajax({
	// 	url: "{{ route('autocompletePersona') }}",
	// 	method: "POST",
	// 	data: {
	// 			query: id_persona,
	// 			_token: _token,
	// 		},
	// 		success: function(result){
	// 			//console.log(result);
	// 			var arreglo = JSON.parse(result);
	// 			console.log(arreglo.personas.length);
	// 			if(arreglo.personas.length == "0"){
	// 				$('#modalPersona').modal('show');
	// 			}
	// 		}

	// 	});
	</script>
@endpush --}}