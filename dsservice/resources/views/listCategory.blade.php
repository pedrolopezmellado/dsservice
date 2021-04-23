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
    <div class="cerrar">
        <a href="{{ action('WebController@showHomeAdmin') }}">VOLVER</a> 
    </div>
    <div class="titulo">
        <h1> Categorias </h1>
    </div>
</div>
@endsection


@section('content')
<div style="text-align:center; height:8%; margin-top:60px">
    
    <div>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <select style="height: 35px;" name="category" id="category" >
                <option value='Ninguna' selected="selected" >Ninguna</option> 
                @foreach($categorias as $categoria)
                    <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                @endforeach
            </select>

            <input type="text" name="newname" placeholder="Escribe el nombre a modificar..." style=" height:35px; width:30%; padding-left:10px;">
            <input type="submit" name="modificar" value="Modificar" style="height:35px; width:80px;" formaction="{{ action('WebController@modifyCategory') }}">
            <input type="submit" name="delete" value="Borrar" style="height:35px; width:80px;" formaction="{{ action('WebController@deleteCategory') }}">
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