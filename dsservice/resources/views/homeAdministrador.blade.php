@extends("master")

<style> 
  .boton_personalizado{
        text-decoration: none;
        font-weight: 300;
        font-size: 20px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
        width: 150px;
        height: 170px;
    }

    .boton_personalizado2{
        text-decoration: none;
        font-weight: 300;
        font-size: 20px;
        color: #ffffff;
        background-color: #2b2c30;
        border: 2px #ffffff;
        width: 150px;
        height: 170px;
    }
</style>
@section('title', 'homeAdministrador')


@section('content')

<div style="font-size:10px; font-family: arial">
        <a href="{{ action('WebController@showHome') }}">CERRAR SESIÓN</a> 
</div>

<div style="margin-top: 20px; margin-left:700px">  
    <form 
        method="GET"
        enctype="multipart/form-data">
            <input type="submit" class="boton_personalizado" value="Usuarios" style="height:35px;" formaction="{{ action('WebController@listarUsuarios') }}">
            <input type="submit" class="boton_personalizado2" value="Categorias" style="height:35px;" formaction="{{ action('WebController@listCategory') }}">
    </form>

</div>
    
@endsection