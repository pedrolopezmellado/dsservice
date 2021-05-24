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

  .imagen {
        width: 200px;
        height: 175px;
        padding-bottom: 15px;
        text-align: center;
    }
</style>

@section('title', 'Lista de mis compras')

@section('head')

<div class="head">
  <div style="margin-left: 250px; margin-top: 30px;">
    <a href ="{{ action('HomeController@index') }}">
      <img src="{{asset('images/cerrar.png') }}" width="40px" height="40px"> 
    </a>
  </div>
  <div class="titulo">
    <h1>Servicios adquiridos</h1>
  </div>
</div>
@endsection

@section('content') 

@if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
@endif

@if(session('mensajeDisputa'))
        <div class="alert alert-success">
            {{ session('mensajeDisputa') }}
        </div>
@endif

<div>
<form action="{{ action('HomeController@tipoPurchases') }}" method="GET" enctype="multipart/form-data">
    @csrf
    <div style="text-align:center">
      <b style="padding-right: 10px;"> Mostrar: </b>
      <select name="tipo" id="tipo" onchange="this.form.submit();" style="height: 30px;">
        <option value='SinOrden' @if($tipo == '' or $tipo == 'SinOrden') selected="selected" @endif> Todas</option> 
        <option value='Accepted'  @if($tipo == 'Accepted') selected="selected" @endif>Aceptadas</option> 
        <option value='Inproccess' @if($tipo == 'Inproccess') selected="selected" @endif>En proceso </option>
        <option value='Precio ↑' @if($tipo == 'Precio ↑') selected="selected" @endif> Precio ↑ </option>
        <option value='Precio ↓' @if($tipo == 'Precio ↓') selected="selected" @endif> Precio ↓ </option>
        <option value='Nombre ↑' @if($tipo == 'Nombre ↑') selected="selected" @endif> Nombre ↑ </option>
        <option value='Nombre ↓' @if($tipo == 'Nombre ↓') selected="selected" @endif> Nombre ↓ </option>
      </select>
    </div>    
  </form>

  <div class ="row">
    @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
      <div class="column">
        <form method="POST" enctype="multipart/form-data">
          @csrf
          <div class="text">
          <a href="{{url('detailedPurchase', ['purchase' => $myPurchase])}}">
          @if($myPurchase->service->image != "")
          <img class="imagen" src="{{ asset('images/'.$myPurchase->service->image) }}"/> </br>  
            @else
            <img class="imagen" src="{{asset('images/default2.png')}}"/> </br> 
            @endif
          
          {{ $myPurchase->service->name }}
          </a>
          

              <input type="hidden" name="purchase" value="{{ $myPurchase }}" style="height:35px;">

              <input type="hidden" name="name" value="{{ $myPurchase->id }}" style="height:35px;">
              <div>
              @if($myPurchase->status == "accepted")
                Aceptada
              @else
                En proceso
              @endif
              </br> 

              <input  type="image"  onclick="return confirm('¿Está seguro que desea eliminar esta compra?')"src="{{asset ('images/papelera.png')}}" class="button" name="delete" value="Borrar" style="height:25px;" 
              formaction="{{ action('HomeController@deletePurchase') }}">   
              </div>
          </div>
        </form>
      </div>
    @endforeach
  </div>
</div>

<div style="text-align:center; margin-top: 150px">
{{ $myPurchases->appends($data)->links() }}
</div>
@endsection