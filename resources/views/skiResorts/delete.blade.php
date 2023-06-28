@php($pagina=Route::currentRouteName())
@extends('layouts.master')

@section('titulo', "Borrado de la estación de esquí $skiResort->name")

@section('contenido')
	<form method="POST" class="my-2 border p-5" action="{{route('skiResort.destroy', $skiResort->id)}}"> 
		{{csrf_field()}}
		<input name="_method" type="hidden" value="DELETE">
        <label for="confirmdelete">Confirmar el borrado de {{"$skiResort->name"}}: </label>
        <input type="submit" alt="Borrar" title="Borrar" class="btn btn-danger m-4" value="Borrar" id="confirmdelete">
    </form>
@endsection

@section('enlaces')
	@parent
	<a href="{{route('skiResort.index')}}" class="btn btn-primary m-2">Lista</a>
@endsection
