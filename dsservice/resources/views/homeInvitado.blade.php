@extends("master")

@section('title', 'Home')

@section('head')
    <div>
        <div style="text-align:right; height:15%">
            <a href="{{ action('WebController@showInicioSesion') }}" >Inicio sesión</a>
            <a href="{{ action('WebController@showRegistro') }}" >Registro</a>
        </div>
    </div>
@endsection

@section('search')
    <div style="text-align:center; height:8%">
        
        <form action="{{ action('WebController@buscador') }}"
            method="POST"
            enctype="multipart/form-data">
            
            @csrf
            <select name="categorias" style="height:35px;">
                <option value="Ninguna">Ninguna</option>
                <option value="Programacion">Programación</option>
                <option value="Edicion">Edición</option>
                <option value="Marketing">Marketing</option>
                <option value="Doblaje">Doblaje</option>
                <option value="Coches">Coches</option>
            </select>
            <input type="text" name="buscador" placeholder="Escribe el servicio que necesitas..." style=" height:35px; width:30%">
            <input type="submit" name="buscar" value="Buscar" style="height:35px;">
        </form>

    </div>

@endsection

@section('content')

    @foreach( $services as $service) <!--  display:inline; -->
        <div style="background-color:blue; width:12%; height:22%; padding-left:10px; padding-right:10px; padding-bottom:10px;">
            {{ $service->name }}
        </div>
    @endforeach

@endsection