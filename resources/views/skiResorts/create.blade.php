@php($pagina=Route::currentRouteName())

@extends('layouts.master')

@section('titulo', 'Nueva estación de esquí')

@section('contenido')
	<form class="my-2 border p-5" method="POST" enctype="multipart/form-data" action="{{route('skiResort.store')}}" > 
		@csrf <!-- {{csrf_field()}} -->
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-Brand">Nombre</label> 
			<input name="name" type="text" class="up form-control col-sm-10" id="inputName" 
					maxlength="256" required="required" value="{{old('name')}}">
		</div>
		<div class="form-group row"> 
			<label for="inputModel" class="col-sm-2 col-form-label">Ciudad</label> 
			<input name="town" type="text" class="up form-control col-sm-10" id="inputModel" 
						maxlength="256" required="required" value="{{old('town')}}">
		</div>
		<div class="form-group row"> 
			<label for="inputCountry" class="col-sm-2 col-form-label">País</label> 
			<input name="country" type="text" class="up form-control col-sm-10" id="inputCountry" 
						maxlength="256" required="required" value="{{old('country')}}">
		</div>
        <div class="form-group row">
 			<label for="inputLifts" class="col-sm-2 col-form-label">Remontes</label> 
            <input name="lifts" type="number" class="up form-control col-sm-4" id="inputLifts" 
                    		maxlength="5" required="required" min="0" step="1" value="{{old('lifts')}}">
		</div>
        <div class="form-group row">
 			<label for="inputSlopeKms" class="col-sm-2 col-form-label">Kms</label> 
            <input name="slopeKms" type="number" class="up form-control col-sm-4" id="inputSlopeKms" 
                    		maxlength="11" required="required" min="0" step="0.01" value="{{old('slopeKms')}}">
		</div>
		<div class="form-group row">
 			<label for="inputRuns" class="col-sm-2 col-form-label">Pistas Totales</label> 
            <input name="runs" type="number" class="up form-control col-sm-4" id="inputRuns" 
                    		maxlength="11" required="required" min="0" step="0.01" value="{{old('runs')}}">
		</div>
        <div class="form-group row"> 
        	<div class="form-check">
            	<input name="isOpen" value="1" class="form-check-input"  
            			type="checkbox" {{ empty(old('isOpen'))? "" : "checked" }}>
        		<label for="isOpen" class="col-sm-2 col-form-label">Estación abierta</label>
        	</div>
		</div>
		<div class="form-group row">
 			<label for="inputOpenRuns" class="col-sm-2 col-form-label">Pistas abiertas</label> 
            <input name="openRuns" type="text" class="up form-control col-sm-4" id="inputOpenRuns" 
                    		maxlength="11" min="0" step="0.01" value="{{old('openRuns')}}">
		</div>
		<!-- 
		<div class="form-group row"> 
			<label for="inputSeasonStart" class="col-sm-2 col-form-label">Inicio Temporada</label> 
			<input name="seasonStart" type="text" class="up form-control col-sm-10" id="inputSeasonStart" 
						maxlength="128" value="{{old('seasonStart')}}">
		</div>
		<div class="form-group row"> 
			<label for="inputSeasonEnd" class="col-sm-2 col-form-label">Fin temporada</label> 
			<input name="seasonEnd" type="text" class="up form-control col-sm-10" id="inputSeasonEnd" 
						maxlength="128" value="{{old('seasonEnd')}}">
		</div>
		 -->
		<div class="form-group row">
 			<label for="inputImage" class="col-sm-2 col-form-label">Imagen</label> 
            <input name="image" type="file" class="form-control-file col-sm-10 " id="inputImage">
		</div>
        <div class="form-group row">
        	<button type="submit" class="btn btn-success m-2 mt-5">Guardar</button> 
            <button type="reset" class="btn btn-secondary m-2">Borrar</button>
        </div>
	</form>	
@endsection

@section('enlaces')
	@parent
	<a href="{{route('skiResort.index')}}" class="btn btn-primary m-2">Lista</a>
@endsection