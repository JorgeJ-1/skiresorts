<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicación de gestión de estaciones de esquí - skiresorts">
        <meta name="author" content="J.Gómez">
		<title>{{config('app.name')}} - @yield('titulo')</title>                

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Carga del CSS de Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> 
    </head>
    <body class="container p-3">
    	<h1 class="page-header bg-secondary-subtle">Estaciones de esquí del mundo</h1>
    	@section('navegacion') 
    	<nav> 
            <ul class="nav nav-pills my-3">
                <li class="nav-item mr-2">
                	<a class="nav-link {{$pagina=='portada'? 'active':''}}" href="{{route('portada')}}">Inicio</a> 
                </li>
                <li class="nav-item mr-2">
                	<a class="nav-link {{$pagina=='skiResort.index' || $pagina=='skiresort.search' ? 'active':''}}" 
                		href="{{route('skiResort.index')}}">Lista</a> 
                </li>
                <li class="nav-item mr-r2">
                	<a class="nav-link {{$pagina=='skiResort.create'? 'active':''}}" href="{{route('skiResort.create')}}">Nueva estación de esquí</a>
                </li>
                <li class="nav-item mr-r2">
                	<a class="nav-link {{$pagina=='contact'? 'active':''}}" href="{{route('contact')}}">Contacto</a>
                </li>
            </ul>
        </nav>    
		@show
		<main>
			<h2>@yield('titulo')</h2>
			
			@if(Session::has('success'))
			<x-Alert type="success" message="{{Session::get('success')}}"/>	
			@endif
			
			@if($errors->any())
			<x-Alert type="danger" message="Se han producido errores">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</x-Alert>
			@endif
			
			@yield('contenido')
			
			
			
			<div class="btn-group" role="group" aria-label="links">
				@section('enlaces')
					<a href="{{route('portada')}}" class="btn btn-primary m-2">Inicio</a>
				@show
			</div>
			@section('pie')
			<footer class="page-footer font-small p-4 bg-light">
				<p>Aplicación creada por J.Gómez como ejemplo de clase. 
				   Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>
			</footer>
			@show
		</main>
	</body>
</html>