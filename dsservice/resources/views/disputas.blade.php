@extends("master")

@section('title', 'Mis disputas')

@section('head')
    <div class="head">
        
        <div class="cerrar">
            <span>Falta botón para volver</span>
        </div>
        <div class="titulo">
            <h1>
                Mis disputas
            </h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="contenido">
        @foreach( $disputas as $disputa)
            <div class="contenido-disputa">
                <div class="texto-disputa">
                    <span style="font-family: arial; font-size: 18px"> {{ $disputa->purchase->service->name }} </span> <br>
                    <span style="font-family: arial; font-size: 12px;"> {{ $disputa->purchase->user->name }} </span> <br>                    
                </div>
                <form method="POST" action="{{ action('WebController@deleteClaim') }}">
                    @csrf

                    <input style="position:relative; left: 85%;" type="submit" name="borrar" value="Borrar">
                    <input type="hidden" name="claim_id" value="{{ $disputa->id }}">

                </form>
            </div>
        @endforeach
        {{ $disputas->links() }}
    </div>

@endsection

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
</style>