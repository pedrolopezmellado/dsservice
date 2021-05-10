@extends("master")

@section('title', 'Compra')

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
            <input type="number" name="account" min="100000000000" max="9999999999999999" value="Tu tarjeta" required>
            CVV:
            <input type="number" name="cvv" min="100" max="999" size="1" value="CVV" required>
            </div>
            <div>
            Mes:
            <input type="number" name="mes" min="1" max="12" size="5" value="Mes" required>
            Año:
            <input type="number" name="year" min="2021" size="5" value="Año" required>
            </div>
            <div>
            Tu precio:
            <input type="number" name="amount" min="0" size="1" value="Tu precio" required>
            <input type="submit" name="enviar" value="Realizar pedido">
            <!-- <button type="button">Enviar</button> -->
            
            </div>
    </form>

@endsection