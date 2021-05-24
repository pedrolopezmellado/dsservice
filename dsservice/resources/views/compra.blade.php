@extends("master")

@section('title', 'Compra')

  <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{url('servicio', ['service' => $service])}}">
            <img src="{{asset('images/cerrar.png') }}" width="40px" height="40px">
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
     padding: 20px;
  }

.button {
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
  margin-top: 20px;
}

.lateral {
  margin-left:180px;
 width: 20%;  /* Este será el ancho que tendrá tu columna */
 float:left; /* Aquí determinas de lado quieres quede esta "columna" */
 height:400px;
}

.principal {
 width: 50%;
 float: right;
 height:400px;
}

.texto {
  padding-top:15px;
  font-size:18px;
}
</style>

    <form action="{{ action('HomeController@createPurchase') }}"
        method="POST"
        enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="servicio" value=" {{ $service->id }}  " style="height:35px;" required>
            <div class="container">
              <div class="lateral">
               <div class="texto">
                 DESCRIPCION
               </div>
               <textarea style="resize:none" name="description" rows="4" cols="59" placeholder="Quiero..." required></textarea>
               <div class="texto">
                 PRECIO
               </div>
               <input type="number" name="amount" min="0" size="1" value="Tu precio" placeholder="100" required>
              </div>

              <div class="principal">
              <div class="texto">
                  NÚMERO DE TARJETA
               </div>
                <input type="text" name="account" minlength="16" maxlength="16" pattern="\d{16}" placeholder="1111 2222 3333 4444" required>
                <br/>
                <div class="texto">
                  CÓDIGO CVV
               </div>
                <input type="text" name="cvv" size="1" minlength="3" maxlength="3" pattern="\d{3}" placeholder="123" required>
                <br/>
                <div class="texto">
                  FECHA DE CADUCIDAD
               </div>
                <input type="number" name="mes" min="1" max="12" size="5" value="Mes" placeholder="Mes" required>
                <input type="number" name="year" min="2021" size="5" value="Año" placeholder="Año"  required>
                <br/>
                <input class="button" type="submit" name="enviar" value="Realizar pedido">

              </div>

              <!-- 

            <div class="container">
              <textarea name="description" rows="4" cols="59" placeholder="Quiero..." required></textarea>
            <div>
              Tarjeta:
              <input type="text" name="account" minlength="16" maxlength="16" pattern="\d{16}" placeholder="1111 2222 3333 4444" required>
              CVV:
              <input type="text" name="cvv" size="1" minlength="3" maxlength="3" pattern="\d{3}" placeholder="123" required>
            </div>
            <div>
              Fecha de caducidad
              <input type="number" name="mes" min="1" max="12" size="5" value="Mes" placeholder="Mes" required>
              <input type="number" name="year" min="2021" size="5" value="Año" placeholder="Año"  required>
            </div>
            <div>
            Tu precio:
            <input type="number" name="amount" min="0" size="1" value="Tu precio" placeholder="100" required>
            <input class="button" type="submit" name="enviar" value="Realizar pedido">
          <button type="button">Enviar</button> -->
            
            </div>
    </form>

@endsection