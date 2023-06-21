<!DOCTYPE html> 
<html lang="es">
    <head>
        <!-- Etiquetas META -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicación de gestión de estaciones de esquí skiresorts">
        <!-- Título de la página -->
        <title>{{config('app.name')}} - PORTADA</title>

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
            <h2>Detalles de la estación de esquí {{"$skiResort->name"}}</h2>
            @if(Session::has ('success'))
            	<div class="alert alert-success">
            		{{Session::get('success')}}
            	</div>
            @endif
            <table class="table table-striped table-bordered ">
            	<tr>
            		<td>ID</td>
            		<td>{{$skiResort->id}}</td>
            	</tr>
            	<tr>
            		<td>Nombre</td>
            		<td>{{$skiResort->name}}</td>
            	</tr>
            	<tr> 
            		<td>Ciudad</td>
            		<td>{{$skiResort->town}}</td>
            	</tr>
            	<tr>
            		<td>Precio</td>
            		<td>{{$skiResort->lifts}}</td>
            	</tr>
            	<tr>
            		<td>Kms</td>
            		<td>{{$skiResort->year}}</td>
            	</tr>
            	<!--  
            	<tr>
            		<td>Matriculada</td>
            		<td>{{$skiResort->matriculada? 'SI': 'NO'}}</td>
            	</tr>
            	-->
            </table>
            <div class="text-end my-3"> 
            	<div class="btn-group mx-2">
            		<a class="mx-2" href="{{route('skiResorts.edit', $skiResort->id) }}">
            			<img height="40" width="40" src="{{asset('images/buttons/update.png')}}" alt="Modificar" title="Modificar">
                    </a>
                    <a class="mx-2" href="{{route('skiResorts.delete', $skiResort->id)}}">
                    	<img height="40" width="40" src="{{asset('images/buttons/delete.png')}}" alt="Borrar" title="Borrar">
                    </a> 
            	</div>
            	<div class="btn-group" role="group" aria-label="Links">
            		<a href="{{url('/')}}" class="btn btn-primary m-2">Inicio</a>
            		<a href="{{route('skiResorts.index')}}" class="btn btn-primary m-2">Lista</a> 
            	</div>
            </div>
        </main>
        <!-- PARTE INFERIOR -->
        <footer class="page-footer font-small p-4 bg-light">
        	<p>Aplicación creada por J.Gómez basada en los apuntes de R. Sallent. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
        </footer>
    </body>
</html>
