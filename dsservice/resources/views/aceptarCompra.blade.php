@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  .titulo{
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

    .boton_personalizado{
        text-decoration: none;
        padding: 12px;
        width: 150px;
        font-weight: 600;
        font-size: 18px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
    }
</style>

@section('title', 'resolverCompra')

@section('head')
<div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="{{asset('images/cerrar.png') }}" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1> Compra en proceso </h1>
    </div>
</div>
@endsection


@section('content')
 
<div class="contenido">
    <p> Servicio solicitado: {{ $purchase->service->name }} </p> 
</div>
</br>
<div>
    <p> {{$purchase->user->name}} solicita: {{ $purchase->description}} </p>
</div>
</br>
<div>
    <p> El precio que propone el usuario es de {{ $purchase->amount}} € </p>
</div>

<form action="{{ action('HomeController@acceptPurchase') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <label for="resolucion">La compra es : </label></br>
            <input type="radio" name="resolucion" id="resolucion" value="accpeted">Aceptada
            <input type="radio" name="resolucion" id="resolucion" value="rejected">Rechazada
            </br>
            </br>
            <input type="hidden" name="purchase" value="{{$purchase->id}}" >
            <input type="submit" name="entrar" value="E N V I A R" class="boton_personalizado">
            
</form>
@endsection