@php($pagina=Route::currentRouteName())
@extends ('layouts.master') 
@section('contenido')
    <div class="container">
    <h3 class="mt-4">Estaciones de esquí borradas</h3>
    <div class="text-start"> {{ $skiResorts->links() }} </div> 
    	<table class="table table-striped table-bordered ">
            <tr>
                <th>ID</th>
                <th>Imagen</th> 
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Abierta</th>
                <th></th>
                <th></th>
            </tr>
            @forelse ($skiResorts as $skiResort) 
            <tr>
                <td><b>#{{$skiResort->id}}</b></td>
                <td class="text-center" style="max-width: 80px"> <img class="rounded" style="max-width: 80%"
                	alt="Imagen de {{$skiResort->name}}" 
                	title="Imagen de {{$skiResort->name}}" 
                	src="{{
							$skiResort->image? 
								asset('storage/'.config('filesystems.skiresortImageDir')).'/'.$skiResort->image: 
								asset('storage/'.config('filesystems.skiresortImageDir')).'/void.jpg'
						}}">
                </td>
 
            	<td>{{$skiResort->name}}</td> 
            	<td>{{$skiResort->town}}</td>
            	<td>{{$skiResort->country}}</td>
            	<td>{{$skiResort->isOpen? 'SI': 'NO'}}</td>>
                
                <td>{{$skiResort->user ? $skiResort->user->name: 'Desconocido'}}</td>
                
                <td class="text-center"> 
                	<a href="{{route('skiResorts.restore', $skiResort->id)}}"> 
                		<button class="btn btn-success">Restaurar</button> 
                	</a>
                </td>
                
                <td class="text-center">
                	<a onclick='
                	   if(confirm("¿Estás seguro?"))
                            this.nextElementSibling.submit();'>
                		<button class="btn btn-danger">Eliminar</button>	
                	</a>
                    <form method="POST" class="d-none" action="{{ route('skiResorts.purge') }}"> 
                    	@csrf
                    	<input name="_method" type="hidden" value="DELETE">
                    	<input name="skiResort_id" type="hidden" value="{{ $skiResort->id }}">
                    </form>
                </td>
            </tr>
            @empty 
            <tr>
            	<td colspan="8" class="alert alert-danger">No hay estaciones de esquí borradas.</td>
            </tr>
            @endforelse
        </table>
    </div>
@endsection
