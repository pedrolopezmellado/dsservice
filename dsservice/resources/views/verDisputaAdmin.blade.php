@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>


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

    .titulo{
        color: #black;
        width: 30%;
        height: 100px;
        margin:auto;
        padding-top:10px;
        text-align:center;
        font-family: arial;
        font-size: 20px;
        background-color: white;
    }

    .contenido{
        text-align:left;
        padding-top:50px;
        padding-left:200px;
        font-family: arial;
        font-size: 18px;
    }

    .mensaje{
        color: #B2B2B2;
        text-align:left;
        padding-top:20px;
        padding-left:200px;
        font-family: arial;
        font-size: 14px;
    }

    .radio{
        color: #B2B2B2;
        text-align:center;
        padding-left:500px;
        padding-top:20px;
        font-family: arial;
        font-size: 14px;
    }

    .resolucion{
        
        color: #B2B2B2;
        text-align:left;
        padding-top:20px;
        padding-left:200px;
        font-family: arial;
        font-size: 14px;
    }

    .resolucion2{

        color: #B2B2B2;
        text-align:right;
        padding-top:20px;
        padding-left:745px;
        font-family: arial;
        font-size: 14px;

    }

    .resolucion3{
        position:absolute;
        color: #B2B2B2;
        text-align:left;
        padding-top:-200px;
        padding-left: 850px;
        font-family: arial;
        font-size: 14px;
    }

    

    .imagen {
        width: 200px;
        height: 175px;
        padding-bottom: 15px;
        text-align: center;
    }

    .boton_personalizado{
        margin-left: 500px;
        text-decoration: none;
        padding: 12px;
        width: 150px;
        font-weight: 600;
        font-size: 18px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
    }

    .radios{
      padding-top:10px;
      text-align:center;
    }


</style>  



@section('title', 'verDisputaAdmin')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="images/cerrar.png" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1>     
             {{ $disputas->purchase->service->name }}
        </h1>
    </div>
</div>
@endsection


@section('content')
 
<div class="contenido">
    {{ $disputas->purchase->user->name }}
</div>
<div class="mensaje">
    {{ $disputas->motive }}
</div>
<form action="{{ action('HomeController@resolveClaim') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
  <div class="resolucion">
  <textarea name="comentario"  placeholder="Debido a(...) se resuelve que (...)" rows="8" cols = "100">
  </textarea>
  </div>
  <div class="radios">
    <span style="color:green; font-size:large"> Aceptar </span> &nbsp; <input type="radio" name="resolucion" id="resolucion" value="accepted"> &nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:red; font-size:large"> Rechazar </span> &nbsp; <input type="radio" name="resolucion" id="resolucion" value="rejected"> 
  </div>
  </br>
  </br>
  <input type="hidden" name="disputa" value="{{$disputas->id}}" >
  <input type="submit" name="entrar" value="E N V I A R" class="boton_personalizado">

</form>
@endsection

