@extends("master")


<style>

.titulo{
        color: #black;
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

}

.cliente{
    text-align:left;
    padding-top:50px;
    padding-left:500px;
    font-family: arial;
    font-size: 18px;
}

.comentario{
    padding-top:20px;
    color: #B2B2B2;
    font-family: arial;
    font-size: 14px;
}

.vendedor{
    color: #1EAAF1;
    text-align:left;
    padding-top:50px;
    font-family: arial;
    font-size: 18px;
}

.resolucion{
    padding-top:20px;
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
            <img src="{{asset('images/cerrar.png')}}" width="40px" height="40px">
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
        <img src="{{asset('images/verde.png') }}" width="15px">
        Aceptada
    @elseif($disputa->status === 'rejected')
        <img src="{{asset('images/rojo.png')}}" width="15px">
        Rechazada
    @else
        <img src="{{asset('images/naranja.png')}}" width="15px">
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
@endsection
