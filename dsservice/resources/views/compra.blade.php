@extends("master")

@section('title', 'Compra')

  <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{url('servicio', ['service' => $service])}}">
            <img src="{{asset('images/cerrar.png') }}" width="30px" height="25px">
        </a>
    </div>

@section('content')
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.container {
  padding-top: 10px;
  width: 80%;
  margin:auto;
}

.button {
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  width: 160px;
  height: 40px;
  color: white;
  background-color: #1EAAF1;
  border: none;
  border-radius: 2px;
}

.button:hover{
    background-color: #5e5e5e;
}

.lateral {
  width: 48%;  /* Este será el ancho que tendrá tu columna */
  height:400px;
  float:left;
}

.principal {
  width: 44%;
  height:400px;
  float:right;
}

.texto {
  padding-top:15px;
  font-size:14px;
}

.titulo{
  font-size:22px;
  font-weight: 300;
  font-family: arial;
}
</style>

    <form action="{{ action('HomeController@createPurchase') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="servicio" value=" {{ $service->id }} " required>
      <div class="container">
        <div class="lateral">
          <p class="titulo">Detalles de compra</p>
          <div class="texto">
            DESCRIPCION
          </div>
          <textarea style="resize:none; padding-left: 10px; padding-top: 10px; margin-top: 6px;" name="description" rows="8" cols="59" placeholder="Quiero..." required></textarea>
          <br></br>
          <div class="texto">
            PRECIO
          </div>
          <input style="height:35px; width:120px; margin-top: 6px;" type="number" name="amount" min="0" size="1" value="Tu precio" required>
        </div>

        <div class="principal">
          <p class="titulo">Detalles de pago</p>
          <div class="texto">
            NÚMERO DE TARJETA
          </div>
          <input style="height:35px; width:250px; margin-top: 6px;" type="text" name="account" minlength="16" maxlength="16" pattern="\d{16}" placeholder="1111 2222 3333 4444" required>
          <br></br>
          <div class="texto" style="margin-top:6px;">
            FECHA DE CADUCIDAD &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp CÓDIGO CVV
          <br>
          <input style="height:35px; width:50px; margin-top: 6px;" type="number" name="mes" min="1" max="12" size="5" value="Mes" placeholder="Mes" required>
          <input style="height:35px; width:100px; margin-top: 6px;" type="number" name="year" min="2021" size="5" value="Año" placeholder="Año"  required>
          
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

          <input style="height:35px; width:50px; margin-top: 6px;" type="text" name="cvv" size="1" minlength="3" maxlength="3" pattern="\d{3}" placeholder="123" required>
          </div>
        </div>
      </div>
      <div style="width:20%; margin:auto; text-align:center">
        <input class="button" type="submit" name="enviar" value="C O M P R A R">
      </div>
    </form>

@endsection