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
        margin-left: 40px;
        padding-top: 22px;
        width: 60%;
    }

    .imgredonda{
        width: 45px;
        margin-left: -10px;
        height: 45px;
        border-radius:37px;
        margin-right: 15px;
        float: left;
    }

</style>

@section('title', 'listaUsuarios')

@section('head')
<div class="head">        
    <div style="margin-left: 250px; margin-top: 30px;">
      <a href ="{{action('WebController@showHomeAdmin') }} ">
            <img src="{{asset('images/cerrar.png')}}" width="40px" height="40px">
      </a>
    </div>
    <div class="titulo">
        <h1> Usuarios </h1>
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
        @foreach( $users as $user)
            <div class="contenido-disputa">
                <div class="texto-disputa">
                    @if($user->photo != "")
                        <img class="imgredonda" src="{{ asset($user->photo) }}"/>
                    @else
                        <img class="imgredonda" src="{{asset('images/usuario.png')}}"/>
                    @endif
                    <span style="font-family: arial; font-size: 18px; color:black">  {{ $user->email }} </span> <br>
                    <span style="font-family: arial; font-size: 12px; color: gray;"> {{ $user->name }} </span>

                    <div style="margin-right: -80px; float:right;">
                        <form method="POST" action="{{ action('WebController@deleteUser') }}">
                            @csrf

                            <input style="float:right; position:relative; left: 100%; padding-left: 15px;height:25px; margin-top:-19px" type="image" src="images/papelera.png" name="borrar" value="Borrar">
                            <input type="hidden" name="user_id" value="{{ $user->email }}" style="height:35px;">

                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        
        <div style="text-align:center">
        {{ $users->links() }}
        </div>
    </div>

@endsection