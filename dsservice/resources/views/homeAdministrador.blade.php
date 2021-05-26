@extends("master")

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
        float:right
    }
</style>
@section('title', 'homeAdministrador')


@section('content')

<div style="font-size:10px; font-family: arial;">
        <!-- <a href="{{ action('WebController@showHome') }}">CERRAR SESIÓN</a>  -->
        <a style="color:red; font-size:18px; font-family:arial;float:left;padding-top:15px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
    
@endsection

@section('footer')
<div style="padding-top:150px;margin-left:600px">  
    <form 
        method="GET"
        enctype="multipart/form-data">
            <input type="submit" class="boton_personalizado" value="Usuarios" style="height:65px;width:200px" formaction="{{ action('WebController@listarUsuarios') }}">
            <input type="submit" class="boton_personalizado2" value="Categorías" style="height:65px;width:200px" formaction="{{ action('WebController@listCategory') }}"></br>
            <input type="submit" class="boton_personalizado2" value="Servicios" style="height:65px; width:200px; margin-top:10px" formaction="{{ action('WebController@listarDisputasPendientes') }}">
            <input type="submit" class="boton_personalizado" value="Disputas Pendientes" style="height:65px; width:200px; margin-top:10px" formaction="{{ action('WebController@listarDisputasPendientes') }}">
    </form>

</div>

@endsection