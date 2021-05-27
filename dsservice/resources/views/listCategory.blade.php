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

    .boton{
        text-decoration: none;
        width: 100px;
        height: 35px;
        font-weight: 500;
        font-size: 14px;
        color: white;
        background-color: #1EAAF1;
        border: none;
        border-radius: 2px;
    }
    .boton:hover{
        background-color: #5e5e5e;
    }
</style>

@section('title', 'Lista de categorias')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{action('WebController@showHomeAdmin') }}">
            <img src="{{asset('images/cerrar.png')}}" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1> Categorías </h1>
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

            <input type="text" name="newname" class="form-control @error('newname') is-invalid @enderror" name="newname" value="{{ old('newname') }}" placeholder="Escribe el nombre a modificar..." style=" height:35px; width:550px;; padding-left:10px;" >
            <input class="boton" type="submit" name="modificar" value="M O D I F I C A R" onclick="return confirm('¿Está seguro que desea modificar esta categoría? Se cambiará la categoría de los servicios asociados')" style="height:35px; width:120px;" formaction="{{ action('WebController@modifyCategory') }}">
            <input class="boton" type="submit" name="delete" onclick="return confirm('¿Está seguro que desea eliminar esta categoría? Se borrarán los servicios asociados')"  value="E L I M I N A R" style="height:35px; width:120px;" formaction="{{ action('WebController@deleteCategory') }}">
            <div>
            @error('newname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
            </div>
        </form>

    </div>

    <form action="{{ action('WebController@createCategory') }}" method="POST" enctype="multipart/form-data">
        @csrf       
        <div style="width:40%; margin-left: -5px; margin:auto;">
            <input required type="text" name="name" placeholder="Escribe la categoría que quieras añadir..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" style=" height:35px; width:550px; padding-left:10px; margin-left: -12px;">   
            <input class="boton" type="submit" name="crear" value="C R E A R" style="height:35px; width:120px;">
        </div>
        @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </form>

</div>

@endsection