@php($pagina=Route::currentRouteName())

@extends('layouts.master')

@section('titulo', 'Estaciones de esquí - portada -')

@extends ('layouts.master') @section('titulo', 'Contactar con SkiResorts') 

@section('contenido')

	<main>
        <div class="container row">
        	<form class="col-7 my-2 border p-4" method="POST" action="{{route('contact.email')}}" >
            	@csrf
    	        <div class="form-group row">
            		<label for="inputEmail" class="col-sm-2 col-form-label">Email</label> 
            		<input name="email" type="email" class="up form-control"
            				id="inputEmail" placeholder="Email" maxlength="255" required="required"
            				value="{{old('email')}}">
            	</div>
            	<div class="form-group row">
            		<label for="inputName" class="col-sm-2 col-form-label">Nombre</label> 
            		<input name="name" type="text" class="up form-control"
    				        id="inputName" placeholder="Name" maxlength="255" required="required" value="{{old('name')}}">
            	</div>
            	<div class="form-group row"> 
            		<label for="inputSubject" class="col-sm-2 col-form-label">Asunto</label> 
            			<input name="subject" type="text" class="up form-control"id="inputSubject" 
            				placeholder="Asunto" maxlength="255" required="required" value="{{old('subject')}}">
            	</div>
            	<div class="form-group row">
            		<label for="inputMessage" class="col-sm-2 col-form-label">Mensaje</label> 
            		<textarea name="message" id="inputMessage" maxlength="2048" class="up form-control" required="required">{{old('message')}}</textarea>
            	</div>
            	<div class="form-group row">
            	<button type="submit" class="btn btn-success m-2 mt-5">Enviar</button>
            	<button type="reset" class="btn btn-secondary m-2 mt-5">Borrar</button>
            	</div>
        	</form>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.634261479504!2d2.0553281765781093!3d41.555515585548775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a493650ae03931%3A0xee4ac6c8e8372532!2sCIFO%20Sabadell-Terrassa!5e0!3m2!1ses!2ses!4v1688576556950!5m2!1ses!2ses"  
            		style="min-width: 300px; min-height: 300px;" loading="lazy" 
            		class="col-5 my-2 border p-3" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </main>
@endsection
@section('enlaces')
	@parent
	<a href="{{route('portada')}}" class="btn btn-primary m-2">Portada</a> 
@endsection



