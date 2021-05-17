@extends("master")

@section('title', 'verDisputaAdmin')

@section('head')
<div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="{{asset('images/cerrar.png') }}" width="40px" height="40px">
        </a>
    </div>
    <div class="titulo">
        <h1> Disputas Pendientes </h1>
    </div>
</div>
@endsection


@section('content')
 
<div class="contenido">
    {{ $disputas->purchase->service->name }}
        
</div>
    
@endsection

