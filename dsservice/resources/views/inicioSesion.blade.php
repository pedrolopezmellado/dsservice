@extends("master")

@section('title', 'Inicio sesión')

@section('content')

<form action="{{ action('WebController@iniciarSesion') }}"
        method="POST"
        enctype="multipart/form-data">

            @csrf
            <div class="formulario">
                <div >
                <label> Inicio sesión</label>
                </div>
                <div >
                <input  type="email" name="email" placeholder="Correo electrónico"></input>
                </div>
                <div >
                <input type="password" name="password" placeholder="Contraseña"></input>
                </div>

                <div >
                <button >E N T R A R</button>
                </div>

                <div >
                ¿No tienes una cuenta? 
                <a href="{{ action('WebController@showRegistro') }}" >Regístrate</a>
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