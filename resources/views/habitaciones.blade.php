@extends("layouts.page")

@section("head-extras")

@endsection

@section("content")

<div id="app">
       <table>
       <tr>
            <h1>Habitaciones</h1>
        </tr>

       @foreach($habitaciones as $habitacion)
       <tr>
            <td>{{$habitacion->nombre}}</td>
            <td>
            <form action="/eliminarhabitacion/{{$habitacion->id}}" method="post">
                @method('POST')
                @csrf
                <input type="submit" value="Borrar" class="btn btn-danger">
            </form>
            </td>
        </tr>
        @endforeach
       </table> <br>

       <form action="/crearhabitacion/{{$idhotel}}" enctype="multipart/form-data" method="POST"> 
            @csrf
            @method('POST')
            <h2>Añadir nueva habitacion</h2>
            Nombre: <input type="text" name="nombre"><br><br>
            Estado: <input type="text" name="estado"><br><br>
            Plazas: <input type="number" name="plazas"><br><br>
            Foto: <input type="file" name="foto"><br><br>
            <input type="submit" value="Guardar habitacion" class="btn btn-primary">
       </form>        
    

</div>
@endsection