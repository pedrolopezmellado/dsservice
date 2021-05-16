@extends("master")

@section('title', 'verDisputaAdmin')

@section('head')
<div class="head">        
    <div class="cerrar">
      <a href="{{ action('WebController@showHomeAdmin') }}">VOLVER</a> 
    </div>
    <div class="titulo">
        <h1> Disputas Pendientes </h1>
    </div>
</div>
@endsection


@section('content')
 
<div class="contenido">
    $nombre
        <!-- @foreach( $disputas as $disputas)
            <div class="contenido-disputa" href="{{url('disputaAdmin', ['disputas' => $disputas])}}">
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
        @endforeach -->
</div>
    
@endsection

