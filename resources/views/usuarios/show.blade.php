@extends('layout')

@section('title',"Usuario # {$user->id}")

@section('content')
	<h1> Usuario # {{ $user->id }} </h1>

	<p>Nombre del usuario: {{ $user->id }} </p>
	<p>Correo del usuario: {{ $user->email }} </p>
	<a href="{{ route('users.index') }}" >Regresar a listado de usuarios</a>
@endsection
