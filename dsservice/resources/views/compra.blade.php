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

    <form action="{{ action('WebController@createPurchase') }}"
        method="POST"
        enctype="multipart/form-data">
            @csrf
            <div class="container">
                        <!-- <input type="text" name="motive"> -->
            <textarea name="description" rows="4" cols="59" placeholder="Quiero..."></textarea>
            <div>
            Tarjeta:
            <input type="number" name="account" min="100000000000" max="9999999999999999" value="Tu tarjeta" >
            CVV:
            <input type="number" name="cvv" min="100" max="999" size="1" value="CVV" >
            </div>
            <div>
            Mes:
            <input type="number" name="mes" min="1" max="12" size="5" value="Mes" >
            Año:
            <input type="number" name="year" min="2021" size="5" value="Año" >
            </div>
            <div>
            Tu precio:
            <input type="number" name="amount" min="0" size="1" value="Tu precio" >
            <input type="submit" name="enviar" value="Realizar pedido">
            <!-- <button type="button">Enviar</button> -->
            
            </div>
    </form>

@endsection