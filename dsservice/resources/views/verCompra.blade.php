@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('title', 'Compra detallada')

@section('head')
<div class="head">
  <div style="margin-left: 250px; margin-top: 30px;">  
      <a href ="{{ action('HomeController@myPurchases') }}">
        <img src="{{asset('images/cerrar.png') }}" width="40px" height="40px">  
      </a>
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

.comentario {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  resize: none;
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


.button {
  background-color: #565656;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  margin: 4px 2px;
  cursor: pointer;
  margin-left:240px;
}

.button:hover {
  background-color: #a49dff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  margin: 4px 2px;
  cursor: pointer;
  margin-left:240px;
}

.button:active {
  background-color: #a49dff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  margin: 4px 2px;
  cursor: pointer;
  margin-left:240px;
}

.button2 {
  background-color: #565656;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  cursor: pointer;
}

.button2:hover {
  background-color: #a49dff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  cursor: pointer;

}

.button2:active {
  background-color: #a49dff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  cursor: pointer;
}

.contratado {
  background-color: #a49dff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 900;
  margin: 4px 2px;
  cursor: pointer;
  margin-left:10px;
}



.star-llena {
  background: #a49dff;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 16px;
  width: 16px;
}

.star-vacia {
  background: #ececec;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 16px;
  width: 16px;
}

.star-vacia2 {
  background: #ececec;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 20px;
  width: 20px;
}

.star-valorada {
  background: black;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 20px;
  width: 20px;
}

.star-valorada:hover {
  background: #c6c6c6;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 20px;
  width: 20px;
}

.star-valorada:active {
  background: #c6c6c6;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 20px;
  width: 20px;
}

.star-vacia2:hover {
  background: black;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 20px;
  width: 20px;
}

.star-vacia2:active {
  background: black;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 20px;
  width: 20px;
}

.valor {
  color:black;
  font-weight: 300;
  padding: 15px 32px;
  font-size: 16px;
  margin: 4px 2px;
  margin-left:260px;
}

.darvalor {

  margin-left:420px;
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
                
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $purchase->service->valoration)
                    <div class="star-llena"></div>
                    @else
                    <div class="star-vacia"></div>
                    @endif
                @endfor

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

               
                <div class="row">
                 <form method="GET" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" name="purchase" value=" {{ $purchase->id }}  " style="height:35px;">

                  @if ($purchase->accepted == "accepted")
                  <button class="button" formaction="{{ action('HomeController@abrirDisputa') }}">Disputa</button>
                   @endif
                  <button class="contratado">Contratado</button>
                  </form>
                </div>

                <div class ="precio">
                {{ $purchase->amount }}€
                <div>

                @if ($purchase->accepted == "accepted")
                <div class="row">

                  <b class = "valor">¡Valórame!</b>

                  @for ($i = 1; $i <= 5; $i++)
                  <div class= "darvalor">
                  <form method="POST" enctype="multipart/form-data" class = "pull-left">
                  @csrf

                  <input type="hidden" name="valor" value=" {{ $i }}  " style="height:35px;">

                    @if ($i <= $purchase->valoration)
                    <button class="star-valorada" formaction="{{ action('HomeController@changeValoration') }}" ></button>
                    @else
                    <button class="star-vacia2" formaction="{{ action('HomeController@changeValoration') }}" ></button>
                    @endif
                    <input type="hidden" name="ident" value=" {{ $purchase->id }}  " style="height:35px;">

                      </div>
                    </form>
                  @endfor

                  <form method="POST" enctype="multipart/form-data" class = "pull-left">
                  @csrf

                  <input type="hidden" name="ident" value=" {{ $purchase->id }}  " style="height:35px;">

                  <textarea name="comentario"  rows="3" cols = "35" style="resize:none" >
                  @if($purchase->comentario != "") 
                  {{$purchase->comentario}}
                  @else 
                  <p placeholder="Escriba su comentario..."></p>
                  @endif
                  </textarea>

                  <button class="button2" formaction="{{ action('HomeController@changeComentario') }}" > Enviar</button>

                  </form>

                </div>
                @endif
                
              </div>
            </div>
        </div>

     </div>
  

@endsection