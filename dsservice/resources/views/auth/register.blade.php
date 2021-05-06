@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('title', 'Registro')


@section('content')

    <div style="text-align:center; margin-bottom: 15px; margin-top: 75px">
        <a style="color:blue; font-size:large" href ="{{ action('WebController@showHome') }}">
            <img width="35px" src="images/DSServices.png"/>
            DSServices
        </a>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="formulario">
            </br>
            <div style="font-size:35px; color:black">
            <label> Registrarse</label>
            </div>
            </br>
            <div>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre" style="width:30%; height:45px; margin:auto">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </br>
            <div >
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico" style="width:30%; height:45px; margin:auto">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </br>
            <div >
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" style="width:30%; height:45px; margin:auto">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </br>
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repita la contraseña" style="width:30%; height:45px; margin:auto">
            </div>
            </br>
            <div>
                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="your phone" placeholder="Teléfono" style="width:30%; height:45px; margin:auto">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </br>
            </br>
            <div>
                <button type="submit" class="boton_personalizado">
                    {{ __('E N T R A R') }}
                </button>
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
    }
    .boton_personalizado{
        text-decoration: none;
        font-weight: 900;
        font-size: 18px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: none;
        border-radius: 4px;
        width: 160px;
        height: 45px;
    }
    .boton_personalizado:hover{
        background-color: #5e5e5e;
    }
    </style>

@endsection