@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('title', 'Compra detallada')

@section('head')
<div class="head">
  <div class="cerrar">
    <a href ="{{ action('WebController@myPurchases') }}">VOLVER</span> </a>
  </div>
  <div class="titulo">
    <h1>Servicios adquiridos</h1>
  </div>
</div>
@endsection

@section('content')
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.titulo{
    color: #1EAAF1;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 20px;
    background-color: white;
  }

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.container {
        width: 65%;
        margin: 0 auto;
        padding: 20px;
    }

    .lateral {
 width: 20%;  /* Este será el ancho que tendrá tu columna */
 float:left; /* Aquí determinas de lado quieres quede esta "columna" */
 height:200px;
}

.principal {
 width: 78%;
 float: right;
 border-left:cyan 2px solid; /* ponemos un donde para que se vea bonito */
 height:200px;
}

.username {
 text-align:center;
  padding-top:140px;
  font-size:16px;
}

/* Para limpiar los floats */
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.interior {
  padding-left:30px;
}

.servname {
  font-size:28px;
  font-weight: bold;
}

.categoria {
  font-size:14px;
  font-weight: light;
}

.description {
  padding-top:15px;
  font-size:16px;
  font-weight: light;
  color: gray;
}

.precio {
  padding-top:15px;
  font-size:16px;
  font-weight: light;
  color: gray;
}

</style>

     <div class="container">
        <div class="lateral">
            <div class="username">
            {{ $purchase->service->user->name }}
            </div>
          </div>
          <div class = "principal">
            <div class = "interior">
                <div class ="servname">
                {{ $purchase->service->name }}
                </div>
                <div class ="categoria">
                {{ $purchase->service->category->name }}
                </div>

                <div class ="description">
                {{ $purchase->description }}
                </div>

                <div class ="description">
                {{ $purchase->service->direction }}
                </div>

                <div class ="precio">
                {{ $purchase->amount }}€
                </div>
            </div>
        </div>

     </div>
  

@endsection