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
        
        <!-- Scripts -->
    	<script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script> 
        
    </head>
    <body class="container p-3">
    	@section('navegacion') 
    	 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    	<nav> 
            <ul class="nav nav-pills my-3">
                <li class="nav-item mr-2">
                	<a class="nav-link {{$pagina=='portada'? 'active':''}}" href="{{route('portada')}}">Inicio</a> 
                </li>
                @auth
                <li class="nav-item mr-r2">
                	<a class="nav-link {{$pagina=='home'? 'active':''}}" href="{{route('home')}}">Home</a>
                </li>
                @endauth
                <li class="nav-item mr-2">
                	<a class="nav-link {{$pagina=='skiResort.index' || $pagina=='skiresort.search' ? 'active':''}}" 
                		href="{{route('skiResort.index')}}">Lista</a> 
                </li>
                @auth
                <li class="nav-item mr-r2">
                	<a class="nav-link {{$pagina=='skiResort.create'? 'active':''}}" href="{{route('skiResort.create')}}">Nueva estación de esquí</a>
                </li>
                @endauth
                    @if (Auth: :user ()->has Role('administrador'))
    				<li class="nav-item mr-2">
    					<a class="nav-link {{$pagina== 'admin.deleted.bikes'? 'active':''}}" 
    						href="{{route('admin.deleted.bikes')}}">Motos borradas</a>
                    </li>
                    <li class="nav-item mr-2">
                    	<a class="nav-link {{ $pagina=='admin.users' || $pagina=='admin.users.search' ? 'active' : ''}}"
                    		href="{{route('admin.users')}}">Gestión de usuarios</a>
                    </li>
                    @endif
                @endauth
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
				<p>Aplicación creada por JJ. como ejemplo de clase. 
				   Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>
			</footer>
			@show
		</main>
	</body>
</html>