@extends("master")

@section('title', 'home')

@section('head')
    <div>
        <div style="text-align:right; height:15%">
            <a href="{{ action('WebController@listCategory') }}" >Administrar categorías</a>
            <a href="{{ action('WebController@myPurchases') }}" >Mis Compras</a>

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
            <select style="height: 35px;" name="category" id="category" >
                        <option value='Ninguna' selected="selected" >Ninguna</option> 
                    @foreach($categorias as $categoria)
                        <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                    @endforeach
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

    {{ $services->links() }}

@endsection