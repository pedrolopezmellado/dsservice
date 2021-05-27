@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  .titulo{
        color: black;
        width: 30%;
        height: 100px;
        margin:auto;
        padding-top:10px;
        text-align:center;
        font-family: arial;
        font-size: 30px;
        background-color: white;
    }

    .boton_personalizado{
        margin-left: 450px;
        text-decoration: none;
        padding: 12px;
        width: 150px;
        font-weight: 600;
        font-size: 18px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
    }

    .formulario{
       font-family: arial;
       margin-left: 40px;
    }

    .titulo2{
        color: #1EAAF1;
        font-size:xx-large;
    }

    .texto{
        color:#B2B2B2;
    }
</style>

@section('title', 'resolverCompra')

@section('head')
<div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@showMyPurchasesInProcess') }}">
            <img src="{{asset('images/cerrar.png') }}" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1 style="font-weight: 600;"> {{ $purchase->service->name }} </h1>
    </div>
</div>
@endsection


@section('content')
 <div class="formulario">
    <div class="titulo2">
        <p> Descripción </p> 
    </div>
    </br>
    <div class="texto">
        <p style="font-size:large" > {{ $purchase->description}} </p>
    </div>
    </br>
    <div>
        <p style="font-size:large"> Propuesta de precio: {{ $purchase->amount}} € </p>
    </div>

    <form action="{{ action('HomeController@acceptPurchase') }}"
            method="POST"
            enctype="multipart/form-data">
            
                @csrf
                <label style="font-size:large" for="resolucion">¿Desea aceptar la compra? : </label> &nbsp;&nbsp;
                <span style="color:green; font-size:large"> Aceptar </span> &nbsp; <input required type="radio" name="resolucion" id="resolucion" value="accepted"> &nbsp;&nbsp;&nbsp;&nbsp;
                <span style="color:red; font-size:large"> Rechazar </span> &nbsp; <input required type="radio" name="resolucion" id="resolucion" value="rejected"> 
                </br>
                </br>
                <input type="hidden" name="purchase" value="{{$purchase->id}}" >
                <input type="submit" name="entrar" value="E N V I A R" class="boton_personalizado">
                
    </form>
</div>
@endsection