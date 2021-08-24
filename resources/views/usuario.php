<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Listado</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1, maximum-scale=1"/>
	</head>
	<body>
			<h1><?php echo ($titulo) ?></h1>

		<section>
			<ul>
				<?php  foreach($users as $user): ?>
					<li><?php echo ($user->name) ?></li>
				<?php endforeach; ?>
			</ul>
		</section>

		<footer>
			<!-- @if(! empty($users))
				<ul>
					@foreach ($users as $user)
						<li>{{ $user }}</li>
					@endforeach
				</ul>
			@else
				<p>No hay usuarios registrados </p>
			@endif -->

			<!-- @empty($users)
				<p>No hay usuarios registrados </p>
			@else
				<ul>
					@foreach ($users as $user)
						<li>{{ $user }}</li>
					@endforeach
				</ul>
			@endempty -->
		</footer>
	</body>
</html> 
