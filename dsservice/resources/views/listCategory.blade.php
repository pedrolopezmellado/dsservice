@extends("master")
<style>
    .titulo {
        color: #1EAAF1;
        width: 30%;
        height: 100px;
        margin:auto;
        padding-top:10px;
        text-align:center;
        font-family: arial;
        font-size: 26px;
        background-color: white;
    }
</style>

@section('title', 'Lista de categorias')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="images/cerrar.png" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1> Categorias </h1>
    </div>
</div>
@endsection


@section('content')

@if(session('mensajeCrear'))
        <div class="alert alert-success">
            {{ session('mensajeCrear') }}
        </div>
@endif

@if(session('mensajeModificar'))
        <div class="alert alert-success">
            {{ session('mensajeModificar') }}
        </div>
@endif

@if(session('mensajeEliminar'))
        <div class="alert alert-success">
            {{ session('mensajeEliminar') }}
        </div>
@endif



<div style="text-align:center; height:8%; margin-top:60px">
    
    <div>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <select style="height: 35px;" name="category" id="category" >
                <option value='Ninguna' selected="selected" >Ninguna</option> 
                @foreach($categorias as $categoria)
                    @if($categoria->name != "Sin Categoria")
                    <option value='{{$categoria->name}}' >{{$categoria->name}}</option> 
                    @endif      
                @endforeach
            </select>

            <input type="text" name="newname" placeholder="Escribe el nombre a modificar..." style=" height:35px; width:30%; padding-left:10px;">
            <input type="submit" name="modificar" value="Modificar" onclick="return confirm('¿Está seguro que desea modificar esta categoría? Se cambiará la categoría de los servicios asociados')" style="height:35px; width:100px;" formaction="{{ action('WebController@modifyCategory') }}">
            <input type="submit" name="delete" onclick="return confirm('¿Está seguro que desea eliminar esta categoría? Se borrarán los servicios asociados')"  value="Borrar" style="height:35px; width:90px;" formaction="{{ action('WebController@deleteCategory') }}">
        </form>

    </div>

    <form action="{{ action('WebController@createCategory') }}" method="POST" enctype="multipart/form-data">
        @csrf       
        <div style="padding-left:25px;">
            <input type="text" name="name" placeholder="Escribe la categoría que quieras añadir..." style=" height:35px; width:550px; padding-left:10px;">
            <input type="submit" name="crear" value="Crear" style="height:35px; width:80px;">
        </div>
    </form>

</div>

@endsection