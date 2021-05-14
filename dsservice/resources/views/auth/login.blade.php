<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@extends("master")

@section('title', 'Inicio sesión')

@section('content')

<div style="text-align:center; margin-bottom: 15px; margin-top: 75px">
    <a style="color:blue; font-size:large" href ="{{ action('WebController@showHome') }}">
        <img width="35px" src="images/DSServices.png"/>
        DSServices
    </a>
</div>

<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">

            @csrf
            <div class="formulario">
                <div style="font-size:35px; color:black; font-family:Arial, Helvetica, sans-serif;">
                <label> Inicio sesión</label>
                </div>
                </br>
                </br>
                <div >
                    <input id="email" type="email" placeholder="Email" style="margin-left:450px; width:250px; text-align:center" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </br>
                <div >
                    <input id="password" type="password" placeholder="Contraseña" style="margin-left:450px; width:250px; text-align:center" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </br>
                <div>
                    <button type="submit" class="boton_personalizado">
                        {{ __('Login') }}
                    </button>
                    </br>
                    </br>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
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
        margin:3% auto;
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