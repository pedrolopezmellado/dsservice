@extends("master")


<style>

.titulo{
    color: black;
    width: 30%;
    height: 100px;
    margin:auto;
    padding-top:10px;
    text-align:center;
    font-family: arial;
    font-size: 20px;
    background-color: white;
}

.estado{
    text-align:center;
    height: 60px;
}

.cliente{
    text-align:left;
    margin-top:50px;
    margin-left:500px;
    font-family: arial;
    font-size: 18px;
}

.comentario{
    margin-top:20px;
    color: #B2B2B2;
    font-family: arial;
    font-size: 14px;
}

.vendedor{
    color: #1EAAF1;
    text-align:left;
    margin-top:50px;
    font-family: arial;
    font-size: 18px;
}

.resolucion{
    margin-top:20px;
    color: #B2B2B2;
    font-family: arial;
    font-size: 14px;
}

</style>

@section('title', 'miDisputa')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@listClaims') }}">
            <img src="{{asset('images/cerrar.png')}}" width="30px" height="25px">
        </a>
    </div>
    <div class="titulo">
        <h1>     
             {{ $disputa->purchase->service->name }}
        </h1>
    </div>
</div>
@endsection


@section('content')

<div class="estado">
    @if ($disputa->status === 'accepted')
        <img src="{{asset('images/verde.png') }}" width="20px">
        Aceptada
    @elseif($disputa->status === 'rejected')
        <img src="{{asset('images/rojo.png')}}" width="25px">
        Rechazada
    @else
        <img src="{{asset('images/naranja.png')}}" width="25px"></img>
        En proceso
    @endif
<div>

<div class="cliente">
    {{ $disputa->purchase->user->name}}
<div>
<div class ="comentario">
    {{ $disputa->motive }}
</div>
<div class="vendedor">
    Administrador
</div>
<div class="resolucion">
    {{ $disputa->resolve}}
</div>
@endsection
