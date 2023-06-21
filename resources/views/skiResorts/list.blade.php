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
            <h2>Listado de coches deportivos</h2>
            @if(Session::has('success'))
            	<div class="alert alert-success">
            		{{Session::get('success')}}
            	</div>
            @endif
            <div class="row">
                <div class="col-6 text-start">{{ $skiResorts->links() }}
                </div> 
                <div class="col-6 text-end">
                	<p>Nueva estación de esquí <a href="{{route('skiResorts.create')}}" class="btn btn-success mL-2">+</a></p>
                </div>
            </div>
            <table class="table table-striped table-bordered ">
            	<tr>
            		<th>ID</th>
            		<th>Nombre</th>
            		<th>Ciudad</th>
            		<th>Operaciones</th>
            	</tr>
            	@foreach($skiResorts as $skiResort)
            		<tr>
            			<td>{{$skiResort->id}}</td> 
            			<td>{{$skiResort->name}}</td> 
            			<td>{{$skiResort->town}}</td>
            			<td class="text-center">
            				<a href="{{route('skiResorts.show', $skiResort->id)}}"> 
            					<img height="20" width="20" src="{{asset('images/buttons/details.png')}}" alt="Ver detalles" title="Ver detalles">
            				</a>
            				<a href="{{route('skiResorts.edit', $skiResort->id)}}"> 
            					<img height="20" width="20" src="{{asset('images/buttons/update.png')}}" alt="Modificar" title="Modificar">
            				</a>
            				<a href="{{route('skiResorts.delete', $skiResort->id)}}">
            					<img height="20" width="20" src="{{asset('images/buttons/delete.png')}}" alt="Borrar" title="Borrar">
            				</a>
            			</td>
            		</tr>
            	@endforeach
            	<tr>
            		<td colspan="4">Mostrando {{sizeof($skiResorts)}} de {{$total}}.
            		</td>
            	</tr> 
            </table>
            <div class="btn-group" role="group" label="Links">
            	<a href="{{url('/')}}" class="btn btn-primary mr-2">Inicio</a>
            </div>
        </main>
        <!-- PARTE INFERIOR -->
        <footer class="page-footer font-small p-4 bg-light">
        	<p>Aplicación creada por J.Gómez basada en los apuntes de R. Sallent. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
        </footer>
    </body>
</html>
