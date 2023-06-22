@extends('layouts.master')

@section('titulo', 'Lista de estaciones de esquí del mundo')

@section('contenido')
            <table class="table table-striped table-bordered ">
            	<tr>
            		<th>ID</th>
            		<th>Nombre</th>
            		<th>Ciudad</th>
            		<th>País</th>
            		<th>Operaciones</th>
            	</tr>
            	@foreach($skiResorts as $skiResort)
            		<tr>
            			<td>{{$skiResort->id}}</td> 
            			<td>{{$skiResort->name}}</td> 
            			<td>{{$skiResort->town}}</td>
            			<td>{{$skiResort->country}}</td>
            			<td class="text-center">
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
            	@endforeach
            	<tr>
            		<td colspan="4">Mostrando {{sizeof($skiResorts)}} de {{$total}}.</td>
            	</tr> 
            </table>
@endsection

@section('enlaces')
	@parent
	<a href="{{route('skiResort.index')}}" class="btn btn-primary m-2">Lista</a>
@endsection
