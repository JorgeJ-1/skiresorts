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

            <h2>Borrado de la estación de esquí {{"$skiResort->name"}}</h2>
            <form method="POST" class="my-2 border p-5" action="{{route('skiResorts.destroy', $skiResort->id)}}"> {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <label for="confirmdelete">Confirmar el borrado de {{"$skiResort->name"}}: </label>
                <input type="submit" alt="Borrar" title="Borrar" class="btn btn-danger m-4" value="Borrar" id="confirmdelete">
            </form>
            <div class="btn-group" role="group" aria-label="Links">
                <a href="{{url('/')}}" class="btn btn-primary m-2">Inicio</a>
                <a href="{{route('skiResorts.index')}}" class="btn btn-primary m-2">Lista</a>
                <a href="{{route('skiResorts.show', $skiResort->id)}}" class="btn btn-primary m-2"> Regresar a detalles de la estación de esquí</a>
            </div>
        </main>
        <footer class="page-footer font-small p-4 bg-light">
        	<p>Aplicación creada por J.Gómez basada en los apuntes de R. Sallent. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
        </footer>
    </body>
</html>
