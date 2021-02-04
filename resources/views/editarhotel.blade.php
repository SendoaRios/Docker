@extends("layouts.page")

@section("head-extras")

@endsection

@section("content")
              
    <form action="/modificarhotel/{{$hotel->id}}" method="post" enctype="multipart/form-data" class="w-50">
        @csrf
        <h2 class="mt-5">Modificar datos del hotel</h2>
					
		<div class="form-group">
            <label for="titulo" class="">Nombre: </label>
            <a href="/mostrarhabitaciones/{{$hotel->id}}">{{$hotel->titulo}}</a>
        </div>
					
		<div class="form-group">
            <label for="estrellas" class="">Estrellas: </label>
            <input  name="estrellas" value="{{$hotel->estrellas}}" class="form-control"  type="number">
        </div>
        
        <label for="imagen" class="">Logo: </label><br>
        <img src="\imagenes\{{$hotel->logo}}" style="height:100px;" alt="Foto">
        <input type="file" name="imagen"/>
     
        <input type="submit" value="Guardar hotel" class="btn btn-primary mb-2">
	</form>

@endsection
