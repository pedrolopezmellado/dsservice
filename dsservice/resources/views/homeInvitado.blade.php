@extends("master")

@section('title', 'home')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

.text {
    background-color: #f2f2f2;
    width: 350px;
    margin: 20px;
    font-size: 16px;
}


.imagen {
    width: 350px;
    height: 225px;
    text-align: center;
}

.botonBuscar{
    text-decoration: none;
    width: 100px;
    height: 35px;
    font-weight: 500;
    font-size: 14px;
    color: white;
    background-color: #1EAAF1;
    border: none;
    border-radius: 3px;
}

.botonBuscar:hover{
    background-color: #5e5e5e;
}

</style>

@section('head')
<div>
    <div style="color:blue; float:left; margin-top: 40px; margin-left: 50px;">
        <img style="margin-left: 10px; " width="65px" src="{{asset('images/DSServices.png')}}"/>
        <span style="font-size:28px; margin-left:15px;">DSServices</span>
    </div>
    <div style="float: right; margin-top: 80px; margin-right: 30px;">
        <a style="color: #1EAAF1; text-decoration:none; padding-right:25px; font-size:18px; font-weight:bold; padding-right:50px;" href="{{ action('HomeController@index') }}">Inicio sesión</a>
        <a style="color: black; text-decoration:none; padding-right:25px; font-size:18px; font-weight:bold; padding-right:60px;" href="{{ action('WebController@showRegistro') }}" >Registro</a>
    </div>
</div>


@endsection

@section('search')
    <div style="text-align:center; height:8%; margin-top: 160px">
        
        <form action="{{ action('WebController@buscador') }}"
            method="GET"
            enctype="multipart/form-data">
            
            @csrf
            <select style="height: 35px;" name="category" id="category" >
                        <option value='Ninguna' @if($category == '' or $category == 'Ninguna') selected="selected" @endif>Ninguna</option> 
                    @foreach($categorias as $categoria)
                        <option value='{{$categoria->name}}' @if($category == $categoria->name) selected="selected" @endif>{{$categoria->name}}</option>        
                    @endforeach
            </select>
            <input type="text" name="buscador" placeholder="Escribe el servicio que necesitas..." style=" height:35px; width:45%; padding-left:8px;">
            <input class="botonBuscar" type="submit" name="buscar" value="B U S C A R" style="height:35px;">
        </form>

        <form action="{{ action('WebController@ordenarServicios') }}"
            method="GET"
            enctype="multipart/form-data">
            
            @csrf
            <div style="padding-top:10px;">
                <b> Ordenar por: </b>
                <select name="order" id="order" onchange="this.form.submit();" style="height: 25px;">
                    <option value='SinOrden' @if($order == '' or $order == 'SinOrden') selected="selected" @endif>Sin orden</option> 
                    <option value='NombreAscendente' @if($order == 'NombreAscendente') selected="selected" @endif> Nombre ↑</option>
                    <option value='NombreDescendente' @if($order == 'NombreDescendente') selected="selected" @endif> Nombre ↓</option>
                </select>
            </div>
            <input type="hidden" name="categoriaBusqueda" value="{{ $categoriaBusqueda }}">
            <input type="hidden" name="textoBusqueda" value="{{ $textoBusqueda }}">
        </form>

    </div>
@endsection

@section('content')
<div class ="row" style="margin:auto; margin-top:30px;">

    @foreach( $services as $service) <!--  display:inline; -->
        <div class="col-md-4">
            <div class="text">
                <a style="margin:auto; color: black; text-decoration:none" href="{{url('servicio', ['service' => $service])}}"> 
                @if($service->image != "")
                <img class="imagen" src="{{ asset('images/'.$service->image) }}"/></br> 
                @else
                <img class="imagen" src="{{asset('images/default3.jpeg')}}"/></br>
                @endif
                <br>
                <b>{{ $service->name }} </b>
                <br></br>
                </a>
            </div>
        </div>
            
    @endforeach
    </div>
    <div style="text-align: center;">
        {{ $services->appends($data)->links() }}
    </div>
@endsection

@section('footer')
@include('footer')
@endsection