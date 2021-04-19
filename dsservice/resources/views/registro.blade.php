@extends("master")

@section('title', 'Registro')

@section('content')

    <form action="{{ action('WebController@crearUsuario') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div class="formulario">
                <div >
                <label> Registrarse</label>
                </div>
                <div >
                <input  type="text" name="email" placeholder="Correo electrónico"></textbox>
                </div>
                <div >
                <input type="text" name="name" placeholder="Nombre completo"></textbox>
                </div>

                <div >
                <input type="text" name="phone" placeholder="Teléfono"></textbox>
                </div>

                <div >
                <input type="text" name="password" placeholder="Contraseña"></textbox>
                </div>

                <div >
                <input type="submit" name="entrar" value="E N T R A R">
                </div>

                <div >
                ¿Tienes una cuenta? 
                <a href="{{ url('inicioSesion') }}" >Inicia sesión</a>
                </div>
            </div>

    </form>

    <style>
    .formulario{
        text-align:center;
        margin:20% auto;
    }
    </style>

@endsection