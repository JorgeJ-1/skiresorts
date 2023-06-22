@extends('layouts.master')

@section('titulo', "Actualización de la estación de esquí $skiResort->name")

@section('contenido')
            <form class="my-2 border p-5" method="POST" action="{{route('skiResort.update', $skiResort->id)}}"> 
            	{{csrf_field()}} 
            	<input name="_method" type="hidden" value="PUT">
                <div class="form-group row">
                	<label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                	<input name="name" value="{{$skiResort->name}}" type="text" class="up form-control col-sm-10" id="inputName" placeholder="Nombre" maxlength="256" required="required">
                </div>
                <div class="form-group row">
                	<label for="inputTown" class="col-sm-2 col-form-label">Ciudad</label> 
                	<input name="town" value="{{$skiResort->town}}" type="text" class="up form-control col-sm-10" id="inputTown" placeholder="Ciudad" maxlength="256" required="required">
                </div>
                <div class="form-group row">
                	<label for="inputCountry" class="col-sm-2 col-form-label">País</label> 
                	<input name="country" value="{{$skiResort->country}}" type="text" class="up form-control col-sm-10" id="inputCountry" placeholder="País" maxlength="256" required="required">
                </div>
                <div class="form-group row">
                	<label for="inputLifts" class="col-sm-2 col-form-label">Remontes</label> 
                	<input name="lifts" value="{{$skiResort->lifts}}" type="number" class="form-control col-sm-4" id="inputLifts" min="0" required="required">
                </div>
                <div class="form-group row">
                	<label for="inputSlopeKms" class="col-sm-2 col-form-label">Kms esquiables</label> 
                	<input name="slopeKms" value="{{$skiResort->lifts}}" type="number" class="form-control col-sm-4" id="inputSlopeKms" min="0" required="required">
                </div>                
                <div class="form-group row">
                	<div class="form-check">
                		<input name="isOpen" value="1" class="form-check-input" type="checkbox" {{$skiResort->isOpen? "checked":""}}> 
                		<label class="form-check-label">Abierta</label>
                	</div>
                </div>
                <div class="form-group row">
                	<button type="submit" class="btn btn-success mt-5 m-2">Guardar</button> 
                	<button type="reset" class="btn btn-secondary m-2">Reestablecer</button>
                </div>
            </form>
@endsection

@section('enlaces')
	@parent
	<a href="{{route('skiResort.index')}}" class="btn btn-primary m-2">Lista</a>
@endsection
