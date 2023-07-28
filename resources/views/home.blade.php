@php($pagina=Route::currentRouteName())

@extends('layouts.master')



@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">
                	{{ __('Home') }}
                </div>
                	<table class="table table-striped table-bordered ">
                    	<tr>
                    		<td>Nombre</td>
                    		<td>{{$user->name}}</td>
                    	</tr>
                    	<tr> 
                    		<td>EMail</td>
                    		<td>{{$user->email}}</td>
                    	</tr>
                    	<tr> 
                    		<td>Ciudad</td>
                    		<td>{{$user->town}}</td>
                    	</tr>
                    	<tr>
                    		<td>País</td>
                    		<td>{{$user->country}}</td>
                    	</tr>
                    	<tr>
                    		<td>Fecha de nacimiento</td>
                    		<td>{{$user->bornDate}}</td>
                    	</tr>
                    </table>
                    <table class="table table-bordered ">
                    	<tr>
                    		<th>Imágen</th>
                    		<th>Nombre</th>
                    		<th>Ciudad</th>
                    		<th>País</th>
                    		<th>Abierta</th>
                    		<th>Operaciones</th>
                    	</tr>
                    	@foreach($skiResorts as $skiResort)
                		<tr>
    						<td class="text-center  .img-thumbnail" style="max-width: 80px"> <img class="rounded" style="max-width: 80%"
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
                			<td>{{$skiResort->isOpen? 'SI': 'NO'}}</td>
                			<td class="text-center">
                				<!--  route() es la función helper a la que le pasamos el nombre de la ruta -->
                				<a href="{{route('skiResort.show', $skiResort->id)}}"> 
                					<img height="20" width="20" src="{{asset('images/buttons/details.png')}}" alt="Ver detalles" title="Ver detalles">
                				</a>
                				@auth
                				<a href="{{route('skiResort.edit', $skiResort->id)}}"> 
                					<img height="20" width="20" src="{{asset('images/buttons/update.png')}}" alt="Modificar" title="Modificar">
                				</a>
                				<a href="{{route('skiResort.delete', $skiResort->id)}}">
                					<img height="20" width="20" src="{{asset('images/buttons/delete.png')}}" alt="Borrar" title="Borrar">
                				</a>
                				@endauth
                			</td>
                		</tr>
                		@endforeach
                	</table>
                	@if(count($deletedSkiResorts))
                		<h3 class="mt-4">Estaciones de esquí borradas</h3>
                		<table class="table table-striped table-bordered ">
                			<th>Imágen</th>
                    		<th>Nombre</th>
                    		<th>Ciudad</th>
                    		<th>País</th>
                    		<th>Abierta</th>
                    		<th></th>
                    		<th></th>
                    		@foreach($deletedSkiResorts as $deletedSkiResort)
                        		<tr>
            						<td class="text-center  .img-thumbnail" style="max-width: 80px"> <img class="rounded" style="max-width: 80%"
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
                        			<td>{{$skiResort->isOpen? 'SI': 'NO'}}</td>
                        			<td class="text-center">
                        				<a href="{{route('skiResort.restore', $skiResort->id)}}"> 
                        					<button class="btn btn-success">Restaurar</button>
                        				</a>
                        			</td>
                        			<td class="text-center">
                        				<a onclick='if(confirm("Estás seguro"))
                        								this.nextElementSibling.submit();'>
                        				    <button class="btn btn-danger">Eliminar</button>
                        				</a>
                        				<form method="POST" action="{{route(skiresort.purge, $skiResort->id}}">
                        					@csrf
                        					<input name="_method" type="hidden" value="DELETE">
                        					<input name="skiResort_id" type="hidden" value="{{$skiResort->id}}">
                        					<input type="submit" alt="Borrar" title="Eliminar" class="btn btn-danger" value="Eliminar">
                        				</form>
                        			</td>
                        		</tr>
                			@endforeach
                		</table>
                	@endif
            </div>
        </div>
    </div>
</div>
@endsection
