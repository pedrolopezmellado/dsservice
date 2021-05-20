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

.titulo2{
    color: #08177e;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 30px;
}

.titulo1{
    color: #08177e;
    width: 50%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 50px;
}

.componente1{
    color: #08177e;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 28px;
}

.componente2{
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

.year{
    color: #3a3a3a;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 18px;
}

.profesor1{
    color: #08177e;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 24px;
}

.profesor2{
    color: #1EAAF1;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 24px;
}

.descripcion{
    color: #3a3a3a;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:20px;
    text-align:center;
    font-family: arial;
    font-size: 22px;
    margin-left:30;
}

</style>

            <div class="container">

            <div>
            <Text class ="titulo1">Diseño de sistemas software</Text>
            </div>
            <div>
            <Text class ="year">2020/21</Text>
            </div>
            <div>
            <Text class ="profesor1">Profesor: </Text>
            <Text class ="profesor2">Victor Manuel Sanchez Cartagena</Text>
            </div>
            <Text class ="titulo2">Nombre del proyecto:</Text>
            <Text class ="titulo">DSServices</Text>
            <div>
             <Text class ="componente1"> Integrantes del grupo: </Text>
            </div>
            <div>
             <Text class ="componente2"> ➢José Alberola Torres</Text>
            </div>
            <div>
             <Text class ="componente2"> ➢Aaron Gimenez Mendez </Text>
            </div>
            <div>
             <Text class ="componente2"> ➢Pedro López Mellado</Text>
            </div>
            <div>
             <Text class ="componente2"> ➢Darío Guerrero Montero</Text>
            </div>
             <div>
             <Text class ="titulo2"> Descripción </Text>
            </div>
            <div>
             <Text class ="descripcion"> Este proyecto se ha realizado para la asignatura de Diseño de Sistemas Software. La página se basa en un sistema de compra-venta de servicios.Un usuario podrá reservar servicios y publicar los suyos propios y adicionalmente un rol de administrador. </Text>
            </div>
            </div>


@endsection