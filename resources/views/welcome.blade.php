@php($pagina=Route::currentRouteName())

@extends('layouts.master')

@section('contenido')
	<main>
    	<h2>Bienvenido a estaciones de esquí del mundo</h2>
        <p>Implementación de un <b>CRUD</b> de estaciones de esquí.</p>
        <figure class="row mt-2 mb-2 col-10 offset-1"> 
        	<img class="d-block w-100" alt="Jackson Hole Wyoming" src="{{asset('images/skiresorts/SkiResort00.jpg')}}">
         </figure>
    </main>
@endsection

@section('enlaces')
@endsection