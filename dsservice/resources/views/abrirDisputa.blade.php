@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .text {
        background-color:  #e8f8f5 ;
        width: 350px;
        border: 8px solid  #d1f2eb;
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

    .titulo2{
        width: 30%;
        height: 100px;
        margin:auto;
        text-align:center;
        font-family: arial;
        font-size: 20px;
        background-color: white;
    }

    .imagen {
        width: 200px;
        height: 175px;
        padding-bottom: 15px;
        text-align: center;
    }

    .formulario{
        text-align: center;
        height: 400px;
    }
    .boton{
        text-decoration: none;
        width: 140px;
        height: 35px;
        font-weight: 500;
        font-size: 16px;
        color: white;
        background-color: #1EAAF1;
        border: none;
        border-radius: 3px;
    }
    .boton:hover{
        background-color: #5e5e5e;
    }
</style>  

@section('title', 'Abrir disputa')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href="{{url('detailedPurchase', ['purchase' => $purchase])}}">
            <img src="images/cerrar.png" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1> Abrir disputa </h1>
    </div>
    <div class="titulo2">
        <p> Escribe los motivos de tu disputa. </p>
    </div>
</div>
@endsection

@section('content')
    <div class="formulario">
        <form action="{{ action('HomeController@crearDisputa') }}"
            method="POST"
            enctype="multipart/form-data">
            
                @csrf
                <!-- <input type="text" name="motive"> -->
                <input type="hidden" name="purchase" value=" {{ $purchase->id }}  " style="height:35px;">

                <textarea name="motive" rows="4" cols="50" placeholder="Mis motivos son..." style="width:65%; height:50%; padding-left:10px;padding-top:10px;font-size:16px;"></textarea>
                <br></br>
                <input type="submit" name="enviar" value="E N V I A R" class="boton">
                <!-- <button type="button">Enviar</button> -->

        </form>
    <div>
@endsection