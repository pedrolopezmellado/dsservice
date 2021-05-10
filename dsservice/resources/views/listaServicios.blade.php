@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .text {
        background-color:  #e8f8f5 ;
        width: 350px;
        border: 8px solid  #d1f2eb;
        padding: 50px;
        margin: 20px;
        font-size: 16px;
        margin-bottom: 20px;
    }

    .row{
        margin-top:50px;
    }

    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        text-align:center;
        width: 33.33%;
        padding-left: 20px;
        height: 250px; /* Should be removed. Only for demonstration */
        background-color:white;
    }

    .titulo{
        color: #1EAAF1;
        width: 30%;
        height: 100px;
        margin:auto;
        padding-top:10px;
        text-align:center;
        font-family: arial;
        font-size: 26px;
        background-color: white;
    }

    .imagen {
        width: 200px;
        height: 175px;
        padding-bottom: 15px;
        text-align: center;
    }
</style>  

@section('title', 'Lista de mis servicios')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('WebController@showHomeRegistrado') }}">
            <img src="images/cerrar.png" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1> Mis servicios </h1>
    </div>
</div>
@endsection

@section('content')
<div>
    <div class ="row">
        @foreach( $services as $service) <!--  display:inline; -->
        <div class="column">
            <form method="POST" enctype="multipart/form-data" action= "{{ action('WebController@deleteService') }}">
                @csrf
                <div class="text">
                    <a href="{{url('editarServicio', ['service' => $service])}}"> 
                        <img class="imagen" src="images/{{ $service->image }}"/> </br>  
                    {{ $service->name }}
                    </a>
                    </br>
                    <input type="image" src="images/borrar.jpg" name="delete" value="Borrar" style="height:35px" >
                        
                    <input type="hidden" name="name" value="{{ $service->id }}" style="height:35px;">
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
        
<div style="text-align:center ; margin-top: 150px">
{{ $services->appends($data)->links() }}
</div>
@endsection