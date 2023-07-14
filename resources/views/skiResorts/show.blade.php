@php($pagina=Route::currentRouteName())
@extends('layouts.master')

@section('titulo', "Detalles de la estación de esquí $skiResort->name")

@section('contenido')
		<div class="row">
            <table class="col table table-striped table-bordered ">
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
            		<td>{{$skiResort->slopeKms}}</td>
            	</tr>
            	<tr>
            		<td>Pistas Totales</td>
            		<td>{{$skiResort->runs}}</td>
            	</tr>
            	<tr>
            		<td>Abierta</td>
            		<td>{{$skiResort->isOpen? 'SI': 'NO'}}</td>
            	</tr>
            	<tr>
            		<td>Pistas Abiertas</td>
            		<td>{{$skiResort->openRuns}}</td>
            	</tr>
            </table>
            	
            <table  class="col">
            	<tr>
					<td class="text-center" style="max-width: 180px"> <img class="rounded" style="max-width: 100%"
							alt="Imagen de {{$skiResort->name}}" title="Imagen de {{$skiResort->name}}"
							src="{{
									$skiResort->image? 
									asset('storage/'.config('filesystems.skiresortImageDir')).'/'.$skiResort->image: 
									asset('storage/'.config('filesystems.skiresortImageDir')).'/void.jpg'
								 }}">
					</td>
            	</tr>
            </table>
		</div>
            @auth
            <div class="text-end my-3"> 
            	<div class="btn-group mx-2">
            		<a class="mx-2" href="{{route('skiResort.edit', $skiResort->id) }}">
            			<img height="40" width="40" src="{{asset('images/buttons/update.png')}}" alt="Modificar" title="Modificar">
                    </a>
                    <a class="mx-2" href="{{route('skiResort.delete', $skiResort->id)}}">
                    	<img height="40" width="40" src="{{asset('images/buttons/delete.png')}}" alt="Borrar" title="Borrar">
                    </a> 
            	</div>
            </div>
            @endauth
@endsection

@section('enlaces')
	@parent
					<a href="{{route('skiResort.index')}}" class="btn btn-primary m-2">Lista</a>
@endsection
