@php($pagina=Route::currentRouteName())

@extends('layouts.master')

@section('titulo', 'Nueva estación de esquí')

@section('contenido')
	<form class="my-2 border p-5" method="POST" action="{{route('skiResort.store')}}"> 
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
        	<div class="form-check">
            	<input name="isOpen" value="1" class="form-check-input"  
            			type="checkbox" {{ empty(old('isOpen'))? "" : "checked" }}>
        		<label for="isOpen" class="col-sm-2 col-form-label">Estación abierta</label>
        	</div>
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