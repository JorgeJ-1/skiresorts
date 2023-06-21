<!DOCTYPE html> 
<html lang="es">
    <head>
        <!-- Etiquetas META -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicación de gestión de estaciones de esquí skiresorts">
        <!-- Título de la página -->
        <title>{{config('app.name')}} </title>

        <!-- Carga del CSS de Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> 
    </head>
    <body class="container p-3"> 
    	<nav> 
            <ul class="nav nav-pills my-3">
                <li class="nav-item mr-2">
                	<a class="nav-link active" href="{{url('/')}}">Inicio</a> 
                </li>
                <li class="nav-item mr-2">
                	<a class="nav-link" href="{{route('skiResorts.index')}}">Lista</a> 
                </li>
                <li class="nav-item">
                	<a class="nav-link" href="{{route('skiResorts.create')}}">Nueva estación de esquí</a>
                </li>
            </ul>
        </nav>
        <h1 class="my-2">Gestor de estaciones de esquí con Laravel</h1>
        <main>
			<h2>Nueva estación de esquí</h2>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div> 
			@endif
				<form class="my-2 border p-5" method="POST" action="{{route('skiResorts.store')}}"> 
					{{csrf_field()}}
					<div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-Brand">Nombre</label> 
						<input name="brand" type="text" class="up form-control col-sm-10" id="inputName" 
						placeholder="Nombre" maxlength="256" required="required" value="{{old('name')}}">
					</div>
					<div class="form-group row"> 
						<label for="inputModel" class="col-sm-2 col-form-label">Ciudad</label> 
						<input name="town" type="text" class="up form-control col-sm-10" id="inputModel" 
						placeholder="Ciudad" maxlength="256" required="required" value="{{old('town')}}">
					</div>
                    <div class="form-group row">
                    	<label for="inputLifts" class="col-sm-2 col-form-label">Precio</label> 
                    	<input name="lifts" type="number" class="up form-control col-sm-4" id="inputLifts" 
                    		maxlength="11" required="required" min="0" step="0.01" value="{{old('lifts')}}">
                    </div>
                    <div class="form-group row"> <div class="form-check">
                    	<label for="inputIsOpen" class="col-sm-2 col-form-label">Año</label> 
                    	<input name="year"type="number" class="up form-control col-sm-4" id="inputIsOpen" 
                    		maxlength="4" required="required" min="1900" step="0" value="{{old('year')}}">
                    </div>
                    </div>
                    <div class="form-group row">
                    	<button type="submit" class="btn btn-success m-2 mt-5">Guardar</button> 
                    	<button type="reset" class="btn btn-secondary m-2">Borrar</button>
                    </div>
                </form>
                <div class="btn-group" role="group" aria-label="Links">
                	<a href="{{url('/')}}" class="btn btn-primary m-2">Inicio</a>
                    <a href="{{route('skiResorts.index')}}" class="btn btn-primary m-2">Lista</a> 
                </div>
        </main>
        <footer class="page-footer font-small p-4 bg-light">
        	<p>Aplicación creada por J.Gómez basada en los apuntes de R. Sallent. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
        </footer>
    </body>
</html>
