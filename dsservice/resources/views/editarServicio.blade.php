@extends("master")

@section('title', 'Editar Servicio')
<div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('WebController@showHomeRegistrado') }}">
            <img src="images/cerrar.png" width="40px" height="40px">
        </a>
    </div>
@section('content')

    <form action="{{ action('WebController@modifyService') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div class="formulario">
                <div class="titulo">
                <label> Editar servicio</label>
                </div>
                </br>
                <div >
                <label style="color:#1EAAF1"> ¿Te has olvidado algún detalle? Modifica aquí las características de tu servicio.</label>
                </div>
                </br>
                </br>
                <div >
                <input  type="text" name="name" placeholder="Nombre del servicio"></textbox>
                </div>

                <div >
                <input  type="text" name="direccion" placeholder="Dirección"></textbox>
                </div>

                <div >
                <input type="text" name="preciomin" placeholder="Precio mínimo(€)"></textbox>
                </div>

                <div >
                <input type="text" name="preciomax" placeholder="Precio máximo(€)"></textbox>
                </div>

                <select style="height: 35px;" name="categorias" id="categorias" >
                        <option value='Ninguna' selected="selected" >Ninguna</option> 
                    @foreach($categorias as $categoria)
                        <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                    @endforeach
            </select>

                <div>
                <input style="width:23%; height:17%;" type="text" name="descripcion" placeholder="Escriba una breve descripción del servicio..."></textbox>
                </div>
                </br>
                <div >
                <input type="submit" name="entrar" value="E D I T A R" class="boton_personalizado">
                </div>

            </div>

    </form>

    <style>
    .formulario{
        text-align:center;
        margin:5% auto;
    }

    .boton_personalizado{
        text-decoration: none;
        padding: 12px;
        width: 150px;
        font-weight: 600;
        font-size: 18px;
        color: #ffffff;
        background-color: #1EAAF1;
        border: 2px #ffffff;
    }

    .titulo{
        color: black;
        position: absolute;
        left:648px;
        top: 50px;
        width: 30%;
        height: 100px;
        text-align: center;
        font-weight: 600;
        font-family: arial;
        font-size: 46px;
        background-color: white;
    }
    </style>

@endsection