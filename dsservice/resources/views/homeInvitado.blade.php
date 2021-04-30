@extends("master")

@section('title', 'home')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

.text {
  background-color:  #e8f8f5 ;
  width: 350px;
  border: 8px solid  #d1f2eb;
  padding: 50px;
  margin-left: 75px;
  font-size: 16px;
}

.imagen {
  width: 200px;
  height: 175px;
  padding-bottom: 15px;
  text-align: center;
}

.boton_personalizado{
        text-decoration: none;
        padding: 12px;
        font-weight: 300;
        font-size: 18px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
    }

</style>

@section('head')
    <div>
        <div style="text-align:right; height:15%">
            <a href="{{ action('WebController@showHomeAdmin') }}" >Administrar</a>
            <a style="font-size:large" href="{{ action('WebController@showHomeRegistrado') }}" >Inicio sesión</a>
            <a style="color:darkslategrey; font-size:large" href="{{ action('WebController@showRegistro') }}" >Registro</a>
        </div>
    </div>
@endsection

@section('search')
    <div style="text-align:center; height:8%;">
        
        <form action="{{ action('WebController@buscador') }}"
            method="GET"
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

        <form action="{{ action('WebController@ordenarServicios') }}"
            method="GET"
            enctype="multipart/form-data">
            
            @csrf
            <div>
             <b> Ordenar por: </b>
            <select name="order" id="order" onchange="this.form.submit();" style="height: 25px;">
                <option value='None' selected="selected" > </option> 
                <option value='SinOrden' >Sin orden</option> 
                <option value='NombreAscendente' > Nombre ↑</option>
                <option value='NombreDescendente'> Nombre ↓</option>
            </select>
            </div>
            <input type="hidden" name="categoriaBusqueda" value="{{ $categoriaBusqueda }}">
            <input type="hidden" name="textoBusqueda" value="{{ $textoBusqueda }}">
        </form>

    </div>
@endsection

@section('content')
<div class ="row" style="margin:auto">

    @foreach( $services as $service) <!--  display:inline; -->
        <div class="col-md-6">
            <p class="text" style="margin:auto; margin-top: 50px" > 
            <img class="imagen" src="images/{{ $service->image }}"/></br>
            <b>  {{ $service->name }} </b>
            </p>   
        </div>
            
    @endforeach
    </div>
    <div style="text-align: center;">
        {{ $services->appends($data)->links() }}
    </div>
@endsection