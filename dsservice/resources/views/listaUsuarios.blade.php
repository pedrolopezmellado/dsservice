@extends("master")

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

.text {
  background-color: aqua;
  width: 420px;
  border: 8px solid grey;
  padding: 45px;
  margin-top: 60px;
 
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.button {
    position: absolute;
    margin-left:15px;
}

.titulo{
        color: #1EAAF1;
        position: absolute;
        left:648px;
        top: 50px;
        width: 30%;
        height: 100px;
        text-align: center;
        font-family: arial;
        font-size: 46px;
    }
</style>

@section('title', 'listaUsuarios')
    <div style="font-size:30px; font-family: arial">
        <a href="{{ action('WebController@showHomeAdmin') }}">VOLVER</a> 
    </div>

@section('content')

    <div class="titulo">Usuarios</div>

    <div style="margin-top:50px">
           @foreach( $users as $user) <!--  display:inline; -->
           <div class="column">
                <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <p class="text"><b> {{ $user->email }} 
                     <input type="submit" class="button" name="borrar" value="Borrar" style="height:35px;" 
                        formaction="{{ action('WebController@deleteUser') }}">
                    </b></p>
                    
                    <input type="hidden" name="user_id" value="{{ $user->email }}" style="height:35px;">
                   
                </form>
              </div>
            @endforeach
        </div>
        </div>

        <div style="text-align:center">
        {{ $users->links() }}
        </div>
@endsection