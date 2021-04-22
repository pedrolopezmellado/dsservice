@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

.text {
  background-color: aqua;
  width: 420px;
  border: 8px solid purple;
  padding: 45px;
  margin-top: 100px;
 
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  margin-top:100px;
  text-align:center;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.button {
    position: absolute;
    margin-left:15px;
}

.titulo{
        color: #1EAAF1;
        position: absolute;
        left:648px;
        top: 50px;
        width: 30%;
        height: 100px;
        text-align: center;
        font-family: arial;
        font-size: 26px;
        background-color: white;
    }
</style>  

@section('title', 'Lista de mis servicios')

<div class="head">
        
        <div class="cerrar">
            <a href ="{{ action('WebController@showHomeRegistrado') }}">VOLVER</span> </a>
        </div>
        <div class="titulo">
            <h1>
                Mis Servicios
            </h1>
        </div>
    </div>

@section('content')
  <div>
        </form>
          <div class ="row" style="margin-top: 100px">
           @foreach( $services as $service) <!--  display:inline; -->
           <div class="column">
                <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <a href="{{ action('WebController@showEditarServicio') }}" class="text"> {{ $service->name }} </a>
                    
                    <input type="hidden" name="name" value="{{ $service->id }}" style="height:35px;">
                   
                </form>
              </div>
            @endforeach
        </div>
    </div>
        
        <div style="text-align:center">
        {{ $services->appends($data)->links() }}
        </div>
@endsection