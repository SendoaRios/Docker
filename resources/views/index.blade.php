@extends("layouts.page")

@section("head-extras")

@endsection

@section("content")

<div id="app">
                
    <table style="width:100%">
        <tr>
            <th>Logo</th>
            <th>Nombre</th>
            <th>Estrellas</th>
        </tr>
        @foreach($hotels as $hotel)
        <tr>
            <td><img src="imagenes\{!! $hotel->logo !!}" style="height:100px;" alt="Foto"></td>
            <td>{!! $hotel->titulo !!}</td>
            <td>{!! $hotel->estrellas !!}</td>
            <td><a class="btn btn-success" href="/editarhotel/{{$hotel->id}}">Modificar</a></td>
            <td>
            <form action="/eliminarhotel/{{$hotel->id}}" method="post">
                @method('POST')
                @csrf
                <input type="submit" value="Borrar" class="btn btn-danger">
            </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
