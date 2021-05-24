@extends("master")


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
    .contenido{
        width: 30%;
        height: 580px;
        margin: auto;
        margin-top: 40px;
        background-color: #F2F2F2;
        overflow: hidden;
    }
    .contenido-disputa{
        background-color: white;
        width:90%;
        height: 80px;
        margin: auto;
        margin-top: 40px; 
    }
    .texto-disputa{
        margin-left: 100px;
        padding-top: 22px;
        width: 60%;
    }

    ul.pagination{
        padding-left:0;
        margin-left: 5px;
        list-style: none;
    }

    ul.pagination > li {
        display:inline-block;
        padding-right: 5px;
        padding-left: 5px;
    }

</style>

@section('title', 'listaDisputasPendientes')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="{{asset('images/cerrar.png')}}" width="40px" height="40px">
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
        @foreach( $disputas as $disputas)
            <div class="contenido-disputa">
            <a href="{{url('disputaAdmin', ['disputas' => $disputas])}}">
                <div class="texto-disputa">
                    <span style="font-family: arial; font-size: 18px"> {{ $disputas->purchase->service->name }} </span> <br>
                    <span style="font-family: arial; font-size: 12px;"> {{ $disputas->purchase->user->name }} </span> <br>     
                    @if    ($disputas->status === 'inprocess')   
                        <img src="images/naranja.png" width="15px">
                    @elseif ($disputas->status === 'accepted')
                        <img src="images/verde.png" width="15px">
                    @else
                        <img src="images/rojo.png" width="15px">
                    @endif
                </div>
            </div>
        @endforeach
</div>
    
@endsection


