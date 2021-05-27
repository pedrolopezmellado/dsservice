@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
  .text {
    background-color: aqua;
    border: 8px solid purple;
    width: 350px;
    height: 120px;
    padding-top:35px;
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

  .titulo {
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

<div class="row">
  @foreach( $users as $user) <!--  display:inline; -->
  <div class="column">
    <form method="POST" enctype="multipart/form-data">
      @csrf
      <div class="text">
        {{ $user->email }}
        <input type="submit" class="button" name="borrar" value="Borrar" style="height:35px;" 
          formaction="{{ action('WebController@deleteUser') }}">

        <input type="hidden" name="user_id" value="{{ $user->email }}" style="height:35px;">
      </div>
    </form>
  </div>
  @endforeach
</div>

<div style="text-align:center">
{{ $users->links() }}
</div>
@endsection