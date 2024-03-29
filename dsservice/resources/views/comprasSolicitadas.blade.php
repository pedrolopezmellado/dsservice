@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .text {
        background-color: #e8f8f5 ;
        width: 350px;
        border: 8px solid #d1f2eb;
        padding: 50px;
        margin: 20px;
        font-size: 16px;
        margin-bottom: 20px;
    }

    .row{
        margin-top:50px;
    }

    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        text-align:center;
        width: 33.33%;
        padding-left: 20px;
        height: 250px; /* Should be removed. Only for demonstration */
        background-color:white;
    }


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

    .imagen {
        width: 200px;
        height: 175px;
        padding-bottom: 15px;
        text-align: center;
    }

    .contenido{
        width: 52%;
        height: 580px;
        margin: auto;
        margin-top: 40px;
        background-color: #F2F2F2;
        overflow: hidden;
    }
    .contenido-compra{
        background-color: white;
        width:90%;
        height: 80px;
        margin: auto;
        margin-top: 40px; 
    }
    .texto-compra{
        margin-left: 40px;
        width: 60%;
        line-height:80px;
        font-size: 20px;
    }
.alert-success {
  margin-left:10%;
  margin-top:10px;
  width: 80%;
  padding: 10px;
  background-color: #dff0d8;
  border-color: #d6e9c6;
  color: #3c763d;
}

.alert-success hr {
  width: 30%;
  height: 100px;
  border-top-color: #c9e2b3;
}

.alert-success .alert-link {
  width: 30%;
  height: 100px;
  color: #2b542c;
}
</style>

@section('title', 'Lista de peticiones de compra en proceso')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="images/cerrar.png" width="30px" height="25px">
        </a>
    </div>
    <div class="titulo">
        <h1 style="font-weight: 550;"> Notificaciones </h1>
    </div>
</div>
@endsection

@section('content')
@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif

    <div class ="contenido">
        @foreach( $purchases as $purchase) <!--  display:inline; -->
        <div class="contenido-compra">
            <div class="texto-compra">
            <a href="{{url('aceptarCompra', ['purchase' => $purchase])}}" style="color: black; text-decoration:none"> 
            <!-- @if($purchase->service->image != "")
            <img class="imagen" src="{{ asset('images/'.$purchase->service->image) }}"/> </br>  
                @else
                <img class="imagen" src="{{asset('images/default2.png')}}"/> </br> 
                @endif -->
            
            {{ $purchase->service->name }} 
            </a>
            </div>
            
        </div>
        @endforeach
        <div style="text-align:center; margin-top: 24px;">
            {{ $purchases->links() }}
        </div>
    </div>
@endsection