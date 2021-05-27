@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style> 
  .boton_personalizado{
        text-decoration: none;
        font-weight: 300;
        font-size: 20px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
        width: 150px;
        height: 170px;
    }

    .boton_personalizado2{
        text-decoration: none;
        font-weight: 300;
        font-size: 20px;
        color: #ffffff;
        background-color: #2b2c30;
        border: 2px #ffffff;
        width: 150px;
        height: 170px;
    }

    .imgredonda{
        width: 75px;
        height: 75px;
        border-radius:37px;
        margin-right: 40px;
    }
</style>

@section('title', 'homeAdministrador')

@section('head')
<div>
    <div style="color:blue; float:left; margin-top: 40px; margin-left: 50px;">
        <img style="margin-left: 10px; " width="65px" src="{{asset('images/DSServices.png')}}"/>
        <span style="font-size:28px; margin-left:15px;">DSServices</span>
    </div>
    <div style="float: right; margin-top: 60px; margin-right: 30px;">
        <a style="color:red; text-decoration:none; padding-right:35px; font-size:18px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Cerrar sesión') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @if($user->photo != "")
            <img class="imgredonda" src="{{ asset($user->photo) }}"/>
        @else
            <img class="imgredonda" src="{{asset('images/usuario.png')}}"/>
        @endif
    </div>
</div>

@endsection

@section('content')

<div style="padding-top:200px;">
    <div style="text-align:center;">
    <form method="GET" enctype="multipart/form-data">
        <input type="submit" class="boton_personalizado" value="Usuarios" style="height:70px;width:200px; margin-right:30px;" formaction="{{ action('WebController@listarUsuarios') }}">
        <input type="submit" class="boton_personalizado2" value="Categorías" style="height:70px;width:200px" formaction="{{ action('WebController@listCategory') }}"></br>
        <input type="submit" class="boton_personalizado2" value="Servicios" style="height:70px; width:200px; margin-top:30px; margin-right:30px;" formaction="{{ action('WebController@listarDisputasPendientes') }}">
        <input type="submit" class="boton_personalizado" value="Disputas Pendientes" style="height:70px; width:200px;" formaction="{{ action('WebController@listarDisputasPendientes') }}">
    </form>
    </div>
</div>
    
@endsection