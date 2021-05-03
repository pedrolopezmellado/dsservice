@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('title', 'Registro')


@section('content')

    <div style="text-align:center; margin-bottom: 25px; margin-top: 75px">
        <p style="color:blue; font-size:large">
            <img width="35px" src="images/DSServices.png"/>
            DSServices
        </p>
    </div>

    <form action="{{ action('WebController@crearUsuario') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div class="formulario">
                </br>
                <div style="font-size:35px; color:black">
                <label> Registrarse</label>
                </div>
                </br>
                <div >
                <input  class="textbox" type="text" name="email" placeholder="Correo electrónico"></textbox>
                </div>
                </br>
                <div >
                <input class="textbox" type="text" name="name" placeholder="Nombre completo"></textbox>
                </div>
                </br>
                <div >
                <input class="textbox" type="text" name="phone" placeholder="Teléfono"></textbox>
                </div>
                </br>
                <div >
                <input class="textbox" type="text" name="password" placeholder="Contraseña"></textbox>
                </div>
                </br>
                </br>
                <div >
                <input class="boton_personalizado" type="submit" name="entrar" value="E N T R A R">
                </div>
                </br>
                <div >
                ¿Tienes una cuenta? 
                <a href="{{ url('inicioSesion') }}" >Inicia sesión</a>
                </div>
            </div>

    </form>

    <style>
    .formulario{
        text-align:center;
        margin-top: 10px;
    }
    .textbox{
        width: 275px;
    }
    .boton_personalizado{
        text-decoration: none;
        font-weight: 700;
        font-size: 15px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
        width: 125px;
        height: 45px;
    }
    </style>

@endsection