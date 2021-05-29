@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    body{
        margin:0;
        padding:0;
    }
    .head{
        height:160px;
        background-color: white;
    }
    .cerrar{
        position: absolute;
        left:0px;
        top: 50px;
        width: 30%;
        height: 100px;         
        text-align: center;
        background-color: white;
    }
    .titulo{
        color: #1EAAF1;
        margin:auto;
        text-align: center;
        font-family: arial;
        font-size: 45px;
        font-weight: bold;
    }
    .contenido{
        width: 52%;
        height: 600px;
        margin: auto;
        margin-top: 0px;
        background-color: #F2F2F2;
        overflow: hidden;
    }
    .contenido-disputa{
        background-color: white;
        width:85%;
        height: 80px;
        margin: auto;
        margin-top: 40px; 
    }
    .texto-disputa{
        margin-left: 100px;
        padding-top: 22px;
        width: 60%;
    }

</style>

@section('title', 'listaDisputasPendientes')

@section('head')
<div class="head">        
<div style="margin-left: 250px; margin-top: 30px;">
      <a href ="{{action('WebController@showHomeAdmin') }} ">
            <img src="{{asset('images/cerrar.png')}}" width="30px" height="25px">
      </a>
    </div>
    <div class="titulo">
        <h1> Disputas Pendientes </h1>
    </div>
</div>
@endsection

@section('content')

@if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
@endif

<div class="contenido">
        @foreach( $disputas as $disputa)
            <div class="contenido-disputa">
                <div class="texto-disputa">
                    <a style="text-decoration:none;" href="{{url('disputaAdmin', ['disputas' => $disputa])}}">
                        <span style="font-family: arial; font-size: 18px; color:black"> {{ $disputa->purchase->service->name }} </span> <br>
                        <span style="font-family: arial; font-size: 12px; color: gray"> {{ $disputa->purchase->user->name }} </span>
                    </a>
                    <div style="float:right; margin-right: -50px;">
                        @if    ($disputa->status === 'inprocess')   
                            <img src="images/naranja.png" width="25px" style="margin-top:-18px;">
                        @elseif ($disputa->status === 'accepted')
                            <img src="images/verde.png" width="25px" style="margin-top:-18px;">
                        @else
                            <img src="images/rojo.png" width="25px" style="margin-top:-18px;">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div style="text-align:center; margin-top: 24px;">
            {{ $disputas->links() }}
        </div>
</div>
    
@endsection


