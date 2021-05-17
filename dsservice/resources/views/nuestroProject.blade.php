@extends("master")

@section('title', 'Compra')

  <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('WebController@showHome') }}">
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
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }
.container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
}

.titulo{
    color: #1EAAF1;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 30px;
}

.componente{
    color: #1EAAF1;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 24px;
    margin-left:30;
}
</style>

            <div class="container">
            <Text class ="titulo">Nombre del proyecto:</Text>
            <Text class ="titulo">DSServices</Text>
            <div>
             <Text class ="titulo"> Integrantes del grupo: </Text>
            </div>
            <div>
             <Text class ="componente"> ᐅJosé Alberola Torres</Text>
            </div>
            <div>
             <Text class ="componente"> ᐅAaron Gimenez Mendez </Text>
            </div>
            <div>
             <Text class ="componente"> ᐅPedro López Mellado</Text>
            </div>
            <div>
             <Text class ="componente"> ᐅDarío Guerrero Montero</Text>
            </div>
         
            </div>


@endsection