@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
  .text {
    background-color: aqua;
    border: 8px solid purple;
    width: 350px;
    height: 120px;
    padding-top:35px;
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
<div>
<form action="{{ action('HomeController@tipoPurchases') }}" method="GET" enctype="multipart/form-data">
    @csrf
    <div style="text-align:center">
      <b style="padding-right: 10px;"> Mostrar solo: </b>
      <select name="tipo" id="tipo" onchange="this.form.submit();" style="height: 30px;">
        <option value='None' selected="selected" > </option> 
        <option value='SinOrden' > Todas</option> 
        <option value='Accepted' >Aceptadas</option> 
        <option value='Inproccess' >En proceso </option>
      </select>
    </div>    
  </form>

  <form action="{{ action('HomeController@ordenarPurchases') }}" method="GET" enctype="multipart/form-data">
    @csrf
    <div style="text-align:center">
      <b style="padding-right: 10px;"> Ordenar por: </b>
      <select name="order" id="order" onchange="this.form.submit();" style="height: 30px;">
        <option value='None' selected="selected" > </option> 
        <option value='SinOrden' >Sin orden</option> 
        <option value='Precio ↑' > Precio ↑</option>
        <option value='Precio ↓'> Precio ↓</option>
      </select>
    </div>    
  </form>

  <div class ="row">
    @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
      <div class="column">
        <form method="POST" enctype="multipart/form-data">
          @csrf
          <div class="text">
          <a href="{{url('detailedPurchase', ['purchase' => $myPurchase])}}">{{ $myPurchase->service->name }}</a>
          
          <input  type="image" src="{{asset ('images/borrar.jpg')}}" class="button" name="delete" value="Borrar" style="height:35px;" 
              formaction="{{ action('HomeController@deletePurchase') }}">             

              <input type="hidden" name="purchase" value="{{ $myPurchase }}" style="height:35px;">

              <input type="hidden" name="name" value="{{ $myPurchase->id }}" style="height:35px;">
              <div>
              @if($myPurchase->accepted == "accepted")
                Aceptada
              @else
                En proceso
              @endif
              </div>
          </div>
        </form>
      </div>
    @endforeach
  </div>
</div>

<div style="text-align:center">
{{ $myPurchases->appends($data)->links() }}
</div>
@endsection