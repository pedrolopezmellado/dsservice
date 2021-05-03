@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

.text {
  background-color:  #e8f8f5 ;
  width: 450px;
  border: 8px solid  #d1f2eb;
  padding: 50px;
  margin: 20px;
  font-size: 16px;
}

.imagen {
  width: 200px;
  height: 175px;
  padding-bottom: 15px;
  text-align: center;
}

</style>

@section('title', 'homeRegistrado')

@section('head')
<div>
    <div>
        <p style="color:blue; font-size:x-large">
            <img style="margin-left: 10px" width="55px" src="images/DSServices.png"/>
            DSServices
        </p>
    </div>
    <div style="text-align:right; height:15%">
        <a href="{{ action('WebController@createService') }}" >Añadir Servicio</a>
        <a href="{{ action('WebController@listClaims') }}" >Mis disputas</a>
        <a href="{{ action('WebController@myServices') }}"> Mis Servicios </a>
        <a href="{{ action('WebController@myPurchases') }}" >Servicios Adquiridos</a>
        <a style="color:red" href="{{ action('WebController@showHome') }}" >Cerrar Sesión</a>
        
    </div>
</div>
@endsection

@section('search')
<div style="text-align:center; height:8%;">
        
        <form action="{{ action('WebController@buscadorRegistrado') }}"
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

        <form action="{{ action('WebController@ordenarServiciosRegistrado') }}"
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
        <div class="text">
         <a style="margin:auto; margin-top: 50px" href="{{url('servicio', ['service' => $service])}}"> 
         <img class="imagen" src="images/{{ $service->image }}"/></br> 
         <b>{{ $service->name }} </b></a>
        </div>
        </div>
            
    @endforeach
    </div>
    <div style="text-align: center;">
        {{ $services->appends($data)->links() }}
    </div>

<form action="{{ action('WebController@modifyUser') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div>
                <div>
                <label> {{$user->name}}</label>
                </div>
                </br>
                <div >
                <input  type="text" name="name" placeholder="{{$user->name}}"></textbox>
                </div>

                <div >
                <input  type="text" name="telefono" placeholder="{{$user->phone}}"></textbox>
                </div>

                <div >
                <input type="submit" name="entrar" value="E D I T A R" class="boton_personalizado">
                </div>
</form>

@endsection

<style>
    .boton_personalizado{
        text-decoration: none;
        font-weight: 300;
        font-size: 20px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
        width: 150px;
        height: 50px;
    }

    .sidebar{
        background: #1EAAF1;
        height: 100%;
        width: 100%;
        right: 250px;
        width: 250px;
        transition: right 0.4s ease;
    }

    .sidebar.show{
        right: 0;
    }

    #check{

    }

    label #btn, label #cancel{
        cursor: pointer;
    }

    label #cancel{
        color: red;
    }

    #check:checked ~ .sidebar{ 
        color: white;
    }
</style>

<script>
$('.btn').checked(function(){
    $('.sidebar').toggleClass("show");
});
</script>
