@extends("master")

@section('title', 'Abrir disputa')

@section('content')

    <form action="{{ action('WebController@crearDisputa') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <!-- <input type="text" name="motive"> -->
            <textarea name="motive" rows="4" cols="50" placeholder="Mis motivos son..."></textarea>
            
            <input type="submit" name="enviar">
            <!-- <button type="button">Enviar</button> -->

    </form>

@endsection