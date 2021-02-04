@extends("layouts.page")

@section("head-extras")

@endsection

@section("content")

<div id="app">
    <h1>Crear nuevo hotel</h1>
    <form action="/crearhotel/{{$idhotel}}" enctype="multipart/form-data" method="POST"> 
            @csrf
            @method('POST')
            
            Nombre: <input type="text" name="nombre"><br><br>
            Estado: <input type="text" name="estado"><br><br>
            Plazas: <input type="number" name="plazas"><br><br>
            Foto: <input type="file" name="foto"><br><br>
            <input type="submit" value="Guardar habitacion" class="btn btn-primary">
       </form>  

</div>
@endsection
