@extends('layout')

@section('title','Usuarios')

@section('content')
	<div class="d-flex justify-content-between align-items-end mb-2">
		{{-- <h1 class="pb-1"> {{ $titulo }}</h1> --}}
		<p>
			<a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo usuario</a>
		</p>
	</div>

	@if($users->isNotEmpty())
		<table class="table">
		  	<thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Email</th>
			      <th scope="col">Acciones</th>
			    </tr>   
		  	</thead>
			<tbody>
				@foreach($users as $user)
				    <tr>
				      <th scope="row">{{ $user->id }}</th>
				      <td>{{ $user->name }}</td>
				      <td>{{ $user->email }}</td>
				      <td>
						<form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}

						<a href="{{ route('users.show',$user) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
						<a href="{{ route('users.edit',['user'=>$user->id]) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
						<button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
						</form>
				      </td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
	@else
		<p>No hay usuarios registrados</p>
	@endif
@endsection

	<!-- <ul>
			@forelse($users as $user)
				<li>
					{{ $user->name }}, {{ $user->email }}
					<a href="{{ route('users.show',$user) }}" >Ver detalle</a>|
					<a href="{{ route('users.edit',['user'=>$user->id]) }}" >Editar</a>
					<form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}

						<button type="submit">Eliminar</button>
					</form>
				</li>
			@empty
				<p> No hay usuarios registrados </p>
			@endforelse
	</ul> -->

@section('sidebar')
	<h2>Barra lateral personalizada</h2>
@endsection