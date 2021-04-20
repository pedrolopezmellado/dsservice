@extends("master")

@section('title', 'Crear Servicio')

@section('content')

    <form action="{{ action('WebController@createService') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div class="formulario">
                <div class = "titulo">
                <label> Crear servicio</label>
                </div>
                </br>
                <div >
                <label style="color:#1EAAF1"> Publica un servicio en la plataforma y deja que todo el mundo pueda ver lo que ofreces. </br> 
                Un solo lugar, millones de talentos creativos</label>
                </div>
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

                <div >
                <input type="submit" name="entrar" value="C R E A R" class="boton_personalizado">
                </div>

            </div>

    </form>

    <style>
    .formulario{
        text-align:center;
        margin:10% auto;
    }

    .boton_personalizado{
        text-decoration: none;
        padding: 12px;
        font-weight: 300;
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
        font-family: arial;
        font-size: 46px;
        background-color: white;
    }
    </style>

@endsection