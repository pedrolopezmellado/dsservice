@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('title', 'InfoDelProjecto')

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

.email{
    color: grey;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 20px;
    margin-left:15;
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
    margin-top:40px;
    text-align:center;
    font-family: arial;
    font-size: 22px;
    margin-left:30;
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
  margin-top:15px;
}

</style>

            <div class="container">

                <div>
                   <Text class ="titulo1">Diseño de sistemas software</Text>
                </div>
                <div>
                   <Text class ="year">2020/21</Text>
                </div>
                <br/>
                <div>
                   <Text class ="profesor1">Profesor: </Text>
                   <Text class ="profesor2">Victor Manuel Sanchez Cartagena</Text>
                </div>

                <Text class ="titulo2">Nombre del proyecto:</Text>
                <Text class ="titulo">DSServices</Text>

                <div>
                 <Text class ="componente1"> Integrantes del grupo: </Text>
                </div>
                <br/>
                <div>
                  <Text class ="componente2"> ➢José Alberola Torres </Text>
                  <Text class ="email"> jat18@gcloud.ua.es </Text>
                </div>
                <div>
                 <Text class ="componente2"> ➢Aaron Gimenez Mendez </Text> 
                 <Text class ="email"> agm343@gcloud.ua.es</Text>
                </div>
                <div>
                    <Text class ="componente2"> ➢Pedro López Mellado </Text>
                    <Text class ="email">  plm59@gcloud.ua.es</Text>
                </div>
                <div>
                  <Text class ="componente2"> ➢Darío Guerrero Montero </Text>
                  <Text class ="email">   dgm94@gcloud.ua.es</Text>
                </div>

                <br/>
                <div>
                  <Text class ="titulo2"> Descripción </Text>
                </div>
                <br/>
                <div>
                  <Text class ="descripcion"> Este proyecto se ha realizado para la asignatura de Diseño de Sistemas Software. La página se basa en un sistema de compra-venta de servicios.Un usuario podrá reservar servicios y publicar los suyos propios y adicionalmente hay un rol de administrador. </Text>
                </div>
             
                <form action="{{ action('WebController@enviarComentario') }}"
                  method="GET"
                  enctype="multipart/form-data">
                  
                  @csrf
                   <div style="  text-align: center;">
                    <br/>
                        <div>
                            <Text class ="titulo2">Envía tu comentario </Text>
                        </div>
                        <br/>
                        <div>
                           <textarea name="comentario" rows="4" cols="50" placeholder="Mi comentario..."
                             style="width:500px; height:100px; padding-left:10px;padding-top:10px;font-size:16px;resize:none"></textarea>
                        </div>
                        <button class="button" > E N V I A R</button>
                   </div>
                </form>

                <br/>

             
                <div class ="row" style="  text-align: center;">
                    <div>
                     <Text class ="titulo2">Comentarios </Text>
                    </div>
                    @foreach( $comentarios as $comentario) <!--  display:inline; -->
                        <div class="col-md-6">
                            <br/>
                            <textarea name="comentario" rows="4" cols="50" placeholder="{{$comentario->commentary}}"
                             style="width:500px; height:100px; padding-left:10px;padding-top:10px;font-size:16px;resize:none" readonly></textarea>
                        </div>
                            
                    @endforeach
                    </div>
                    <div style="text-align: center;">
                        {{ $comentarios->appends($data)->links() }}
                    </div>
            
            </div>


@endsection