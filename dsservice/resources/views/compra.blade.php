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
        width: 50%;
        margin: 0 auto;
        padding: 20px;
    }

</style>

    <form action="{{ action('HomeController@createPurchase') }}"
        method="POST"
        enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="servicio" value=" {{ $service->id }}  " style="height:35px;" required>

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
            <input type="number" name="amount" min="0" size="1" value="Tu precio" required>
            <input type="submit" name="enviar" value="Realizar pedido">
            <!-- <button type="button">Enviar</button> -->
            
            </div>
    </form>

@endsection