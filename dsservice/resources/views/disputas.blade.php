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


@section('title', 'Mis disputas')

@section('head')
    <div class="head">
        <div style="margin-left: 250px; margin-top: 30px;">
            <a href ="{{ action('HomeController@index') }}">
                <img src="images/cerrar.png" width="40px" height="40px">
            </a>
        </div>
        <div class="titulo">
            <h1>
                Mis disputas
            </h1>
        </div>
    </div>
@endsection

@section('content')

    @if(session('mensaje'))
            <div class="alert alert-success" >
                {{ session('mensaje') }}
            </div>
    @endif

    <div class="contenido">
        @foreach( $disputas as $disputa)
            <div class="contenido-disputa">
                <div class="texto-disputa">
                    <a href="{{url('miDisputa', ['disputa' => $disputa])}}">
                    <span style="font-family: arial; font-size: 18px"> {{ $disputa->purchase->service->name }} </span> <br>
                    <span style="font-family: arial; font-size: 12px;"> {{ $disputa->purchase->user->name }} </span> <br>     
                    @if    ($disputa->status === 'inprocess')   
                        <img src="images/naranja.png" width="15px">
                    @elseif ($disputa->status === 'accepted')
                        <img src="images/verde.png" width="15px">
                    @else
                        <img src="images/rojo.png" width="15px">
                    @endif
                </div>
                <form method="POST" action="{{ action('HomeController@deleteClaim') }}">
                    @csrf

                    <input style="position:relative; left: 85%; height:25px; margin-top:-40px" type="image" src="images/papelera.png" name="borrar" value="Borrar">
                    <input type="text" name="claim_id" value="{{ $disputa->id }}">

                </form>
            </div>
        @endforeach
        {{ $disputas->links() }}
    </div>
    

@endsection
