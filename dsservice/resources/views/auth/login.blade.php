@extends("master")

@section('title', 'Inicio sesión')

@section('content')

<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">

            @csrf
            <div class="formulario">
                <div >
                <label> Inicio sesión</label>
                </div>
                <div >
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div >
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
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
        margin:20% auto;
    }
    </style>

@endsection