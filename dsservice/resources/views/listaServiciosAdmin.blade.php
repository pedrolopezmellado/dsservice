@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    body{
        margin:0;
        padding:0;
    }
    .head{
        height:160px;
        background-color: white;
    }
    .cerrar{
        position: absolute;
        left:0px;
        top: 50px;
        width: 30%;
        height: 100px;         
        text-align: center;
        background-color: white;
    }
    .titulo{
        color: #1EAAF1;
        margin:auto;
        text-align: center;
        font-family: arial;
        font-size: 45px;
        font-weight: bold;
    }
    .contenido{
        width: 52%;
        height: 600px;
        margin: auto;
        margin-top: 0px;
        background-color: #F2F2F2;
        overflow: hidden;
    }
    .contenido-disputa{
        background-color: white;
        width:85%;
        height: 80px;
        margin: auto;
        margin-top: 40px; 
    }
    .texto-disputa{
        margin-left: 100px;
        padding-top: 22px;
        width: 60%;
    }

</style>

@section('title', 'listaServiciosAdmin')

@section('head')
<div class="head">        
<div style="margin-left: 250px; margin-top: 30px;">
      <a href ="{{action('WebController@showHomeAdmin') }} ">
            <img src="{{asset('images/cerrar.png')}}" width="40px" height="40px">
      </a>
    </div>
    <div class="titulo">
        <h1> Servicios </h1>
    </div>
</div>
@endsection

@section('content')

@if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
@endif

<div class="contenido">
        @foreach( $servicios as $servicio)
            <div class="contenido-disputa">
                <div class="texto-disputa">
                <span style="font-family: arial; font-size: 18px; color:black"> {{ $servicio->name}} </span> <br>
                    <form method="POST" enctype="multipart/form-data" action= "{{ action('WebController@deleteServiceAdmin') }}">
                        @csrf
                        
                        <input style="position:relative; left: 100%; padding-left: 15px;height:25px; margin-top:-25px" type="image" src="images/papelera.png" name="borrar" value="Borrar">
                        <input type="hidden" name="name" value="{{ $servicio->id }}" style="height:35px;">
                    </form>
                </div>
            </div>
        @endforeach

        <div style="text-align:center; margin-top: 24px;">
            {{ $servicios->links() }}
        </div>
</div>
    
@endsection


