@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('title', 'homeRegistrado')

@section('head')
<div>
    <p style="color:blue; font-size:x-large; float: left">
      <img style="margin-left: 10px" width="55px" src="{{asset('images/DSServices.png')}}"/>
      DSServices
    </p>
    <p style="float:right; height:15%; margin-top: 25px">
        @if($user->role === 'admin')
        <a href="{{ action('WebController@showHomeAdmin') }}" >Administrar</a>
        @endif
        <a href="{{ action('HomeController@createService') }}" >Añadir Servicio</a>
        <a href="{{ action('HomeController@listClaims') }}" >Mis disputas</a>
        @if($user->photo != "")
            <img class="imgredonda" src="{{ asset($user->photo) }}" onclick="showPanel()"/>
        @else
            <img class="imgredonda" src="{{asset('images/usuario.png')}}" onclick="showPanel()"/>
        @endif
        
</div>
@endsection

@section('search')
<div style="text-align:center; height:8%; margin-top: 100px">
        
        <form action="{{ action('HomeController@buscadorRegistrado') }}"
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
            <input class="botonBuscar" type="submit" name="buscar" value="B U S C A R">
        </form>

        <form action="{{ action('HomeController@ordenarServiciosRegistrado') }}"
            method="GET"
            enctype="multipart/form-data">
            
            @csrf
            <div>
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

@if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
@endif

<div class ="row" style="margin:auto">

    @foreach( $services as $service) <!--  display:inline; -->
        <div class="col-md-6">
            <div class="text">
            <a style="margin:auto; margin-top: 50px" href="{{url('servicio', ['service' => $service])}}"> 
            @if($service->image != "")
            <img class="imagen" src="{{ asset('images/'.$service->image) }}"/></br> 
            @else
            <img class="imagen" src="{{asset('images/default2.png')}}"/>
            @endif
            <b>{{ $service->name }} </b></a>
            </div>
        </div>
            
    @endforeach
</div>

<div style="text-align: center;">
    {{ $services->appends($data)->links() }}
</div>

<div id="panel" class="panel">
    <button style="float:left" onclick="hidePanel()">jose</button>
    
    <div class="parteSuperior">
        @if($user->photo != "")
            <img class="imgredondaperfil" src="{{ asset($user->photo) }}"/>
        @else
            <img class="imgredondaperfil" src="{{asset('images/usuario.png')}}"/>
        @endif
        <label style="padding-left:20px; font-family:arial; font-size:16px;"> {{$user->name}}</label>
        <p style="margin-top:10px; margin-left:-2px;">Cambiar imagen</p>
    </div>
    <form action="{{ action('HomeController@modifyUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        </br></br>
        <div class="camposPersonales">
            <input type="text" name="name" placeholder="{{$user->name}}" style="width: 80%; height:35px;"></textbox>
            <br></br>
        
            <input  type="text" name="telefono" placeholder="{{$user->phone}}" style="width: 80%; height:35px;"></textbox>
            <br></br>
            
            <input type="submit" name="entrar" value="E D I T A R" class="boton_editar" style="margin-left:174px;">
    </form>
            <br></br>
            <br></br>

            <a href="{{ action('HomeController@myServices') }}" style="font-size:18px; font-family:arial;"> Mis Servicios </a>
            <br></br>
            <a href="{{ action('HomeController@myPurchases') }}" style="font-size:18px; font-family:arial;">Servicios Adquiridos</a>
            <br></br>
            <a href="{{ action('HomeController@showMyPurchasesInProcess') }}" style="font-size:18px; font-family:arial;"> Notificaciones => {{$notificaciones}}</a>
        
            <br></br>
            <br></br>
            <a class="dropdown-item" style="color:red; font-size:18px; font-family:arial;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        
        </div>

</div>

<script>
    function showPanel(){        
        document.getElementById("panel").style.visibility="visible";
    }

    function hidePanel(){        
        document.getElementById("panel").style.visibility="hidden";
    }
</script>

@endsection

<style>
    .text {
        background-color:  #e8f8f5 ;
        width: 350px;
        border: 8px solid  #d1f2eb;
        padding: 50px;
        margin: 20px;
        font-size: 16px;
        margin-left: 100px;
    }

    .imagen {
        width: 200px;
        height: 175px;
        padding-bottom: 15px;
        text-align: center;
    }

    .imgredonda{
        width: 75px;
        height: 75px;
        border-radius:37px;
    }

    .imgredondaperfil{
        width: 100px;
        height: 100px;
        border-radius:48px;
    }

    .boton_editar{
        text-decoration: none;
        width: 110px;
        height: 35px;
        font-weight: 500;
        font-size: 16px;
        color: white;
        background-color: #1EAAF1;
        border: none;
        border-radius: 3px;
    }

    .boton_editar:hover{
        background-color: #5e5e5e;
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

    .parteSuperior{
        margin-top:50px;
        margin-left: 60px;
    }

    .camposPersonales{
        margin-left: 40px;
    }

    .panel{
        width: 400px;
        height: 700px;
        border-bottom: 2px solid #1eaaf1;
        border-left: 2px solid #1eaaf1;
        visibility: hidden;
        position: absolute;
        top: 0;
        right: 0;
    }
</style>

<script>
$('.btn').checked(function(){
    $('.sidebar').toggleClass("show");
});
</script>
