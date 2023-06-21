<!DOCTYPE html> 
<html lang="es">
    <head>
        <!-- Etiquetas META -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicación de gestión de estaciones de esquí skiresorts">
        <!-- Título de la página -->
        <title>{{config('app.name')}}</title>

        <!-- Carga del CSS de Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> 
    </head>
    <body class="container p-3"> 
        <!-- PARTE SUPERIOR (menú) --> 
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
        <!-- PARTE CENTRAL --> 
        <h1 class="my-2">Gestor de estaciones de esquí con Laravel</h1>
        <main>
            <h2>Actualización de la estación de esquí {{"$skiResort->name"}}</h2>
            @if ($errors->any())
            	<div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        	<li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has ('success'))
                <div class="alert alert-success">
                	{{Session::get('success')}}
                </div>
            @endif
            <form class="my-2 border p-5" method="POST" action="{{route('skiResorts.update', $skiResort->id)}}"> 
            	{{csrf_field()}} 
            	<input name="_method" type="hidden" value="PUT">
                <div class="form-group row">
                	<label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                	<input name="name" value="{{$skiResort->name}}" type="text" class="up form-control col-sm-10" id="inputName" placeholder="Nombre" maxlength="256" required="required">
                </div>
                <div class="form-group row">
                	<label for="inputTown" class="col-sm-2 col-form-label">Ciudad</label> 
                	<input name="town" value="{{$skiResort->town}}" type="text" class="up form-control col-sm-10" id="inputTown" placeholder="Ciudad" maxlength="256" required="required">
                </div>
                <div class="form-group row">
                	<label for="inputLifts" class="col-sm-2 col-form-label">Precio</label> 
                	<input name="lifts" value="{{$skiResort->lifts}}" type="number" class="form-control col-sm-4" id="inputLifts" min="0" required="required">
                </div>
                <div class="form-group row"> 
                	<label for="inputIsOpen" class="col-sm-2 col-form-label">Año</label> 
                	<input name="year" value="{{$skiResort->year}}" type="number" class="form-control col-sm-4" id="inputIsOpen" required="required">
                </div>
  				<!--  
                <div class="form-group row">
                	<div class="form-check">
                		<input name="matriculada" value="1" class="form-check-input" type="checkbox" {{$skiResort->matriculada? "checked":""}}> 
                		<label class="form-check-label">Matriculada</label>
                	</div>
                </div>
                -->
                <div class="form-group row">
                	<button type="submit" class="btn btn-success mt-5 m-2">Guardar</button> 
                	<button type="reset" class="btn btn-secondary m-2">Reestablecer</button>
                </div>
            </form>
            <div class="text-end my-3"> 
                <div class="btn-group mx-2">
                    <a class="mx-2" href="{{route('skiResorts.show', $skiResort->id) }}">
                    	<img height="40" width="40" src="{{asset('images/buttons/details.png')}}" alt="Detalles" title="Detalles">
                    </a>
                    <a class="mx-2" href="{{route('skiResorts.delete', $skiResort->id)}}">
                    	<img height="40" width="40" src="{{asset('images/buttons/delete.png')}}" alt="Borrar" title="Borrar">
                    </a>
                </div>
            </div>
            <div class="btn-group" role="group" aria-label="Links">
                <a href="{{url('/')}}" class="btn btn-primary m-2">Inicio</a>
                <a href="{{route('skiResorts.index')}}" class="btn btn-primary m-2">Lista</a> 
            </div>
        </main>
        <!-- PARTE INFERIOR -->
        <footer class="page-footer font-small p-4 bg-light">
        	<p>Aplicación creada por J.Gómez basada en los apuntes de R. Sallent. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
        </footer>
    </body>
</html>
