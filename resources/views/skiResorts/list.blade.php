@php($pagina=Route::currentRouteName())

@extends('layouts.master')

@section('titulo', 'Lista de estaciones de esquí del mundo')

@section('contenido')
	
			<form method=GET class='col-7 row' action="{{route('skiResort.search')}}">
    			<input name="name" type='text' class="col form-control mr-2 mb-2" placeholder="Nombre" maxlength="16" 
    					value="{{$name ?? ''}}">
    			<input name="town" type='text' class="col form-control mr-2 mb-2" placeholder="Ciudad"  maxlength="16" 
    					value="{{$town ?? ''}}">
    			<input name="country" type='text' class="col form-control mr-2 mb-2" placeholder="País"  maxlength="16" 
    					value="{{$country ?? ''}}">
    			<button type="submit" class='col btn btn-primary mr-2 mb-2'>Buscar</button>
    			<a href="{{route('skiResort.index')}}" class='col'>
    				<button type="button"class='btn btn-primary mb-2'  >Quitar filtro</button>
    			</a>		
			</form>
			
            <table class="table table-striped table-bordered ">
            	<tr>
            		<th>ID</th>
            		<th>Imágen</th>
            		<th>Nombre</th>
            		<th>Ciudad</th>
            		<th>País</th>
            		<th>Operaciones</th>
            	</tr>
            	@foreach($skiResorts as $skiResort)
            		<tr>
            			<td>{{$skiResort->id}}</td>
						<td class="text-center" style="max-width: 80px"> <img class="rounded" style="max-width: 80%"
							alt="Imagen de {{$skiResort->name}}" title="Imagen de {{$skiResort->name}}"
							src="{{
									$skiResort->image? 
									asset('storage/'.config('filesystems.skiresortImageDir')).'/'.$skiResort->image: 
									asset('storage/'.config('filesystems.skiresortImageDir')).'/void.jpg'
								 }}">
						</td>
            			 
            			<td>{{$skiResort->name}}</td> 
            			<td>{{$skiResort->town}}</td>
            			<td>{{$skiResort->country}}</td>
            			<td class="text-center">
            				<!--  route() es la función helper a la que le pasamos el nombre de la ruta -->
            				<a href="{{route('skiResort.show', $skiResort->id)}}"> 
            					<img height="20" width="20" src="{{asset('images/buttons/details.png')}}" alt="Ver detalles" title="Ver detalles">
            				</a>
            				<a href="{{route('skiResort.edit', $skiResort->id)}}"> 
            					<img height="20" width="20" src="{{asset('images/buttons/update.png')}}" alt="Modificar" title="Modificar">
            				</a>
            				<a href="{{route('skiResort.delete', $skiResort->id)}}">
            					<img height="20" width="20" src="{{asset('images/buttons/delete.png')}}" alt="Borrar" title="Borrar">
            				</a>
            			</td>
            		</tr>
            		<!--  @if($loop->last)
            		ejemplo de objeto $loop
            		@endif-->
            	@endforeach
           		<tr>
            		<td colspan="7">Mostrando {{$skiResorts->count()}} de {{$skiResorts->total()}}.</td>
            	</tr> 
            </table>
            {{$skiResorts->links()}}
@endsection

@section('enlaces')
	@parent
	<a href="{{route('skiResort.index')}}" class="btn btn-primary m-2">Lista</a>
@endsection
