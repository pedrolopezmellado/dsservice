@extends("master")

@section('title', 'Crear Servicio')
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="images/cerrar.png" width="30px" height="25px">
        </a>
    </div>
@section('content')

@if(session('mensaje'))
    Ha entrado en el if
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
@endif

    <form action="{{ action('HomeController@createService') }}"
        method="POST"
        enctype="multipart/form-data">
        <div class = "titulo">
        <label> Crear servicio</label>
        </div>
            @csrf
            <div class="contenedor">
                
                <div>
                    <label style="color:#1EAAF1">
                        Publica un servicio en la plataforma y deja que todo el mundo pueda ver lo que ofreces. </br> 
                        Un solo lugar, millones de talentos creativos
                    </label>
                </div>
                <br></br>
                <br></br>

                <div class="formulario">
                    <div class="contenido_form">
                        <div style="padding-top:60px;">
                            <input style="height:40px; width:340px; margin-right:20px; padding-left:10px;" type="text" name="name" placeholder="Nombre del servicio" value="{{old ('name')}}" required></textbox>
                            <input style="height:40px; width:340px; padding-left:10px;" type="text" name="direccion" placeholder="Dirección" value="{{old ('direccion')}}" required></textbox>
                        </div>
                        <br></br>

                        <div style="text-align:left">
                            <input style="height:40px; width:134px; margin-left:3px; padding-left:10px;" type="text" name="preciomin" placeholder="Precio mínimo(€)" value="{{old ('preciomin')}}" required>
                            &nbsp &nbsp &nbsp &nbsp -  &nbsp &nbsp &nbsp
                            <input style="height:40px; width:133px; margin-right:20px; margin-left:2px; padding-left:10px;" type="text" name="preciomax" placeholder="Precio máximo(€)" value="{{old ('preciomax')}}" required>
                        
                            <select style="height: 40px; width:340px; padding-left:10px;" name="categorias" id="categorias" required>
                                    <option value='' selected="selected" >Ninguna</option> 
                                @foreach($categorias as $categoria)
                                    <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                                @endforeach
                            </select>
                        
                            @if($errors->any())
                                <span style="color: red;"> Los precios deben ser numéricos </span>
                            @endif
                        </div>
                        <br></br>
                        
                        <div>
                            <textarea style="width:703px; height:150px; padding-left:10px; padding-top:10px;" name="descripcion" placeholder="Escriba una breve descripción del servicio..." value="{{old ('descripcion')}}" required></textarea>
                        </div>
                        <br></br>

                        <div style="text-align:left; margin-left:3px;">
                            <input type="file" name="image" accept="image/png, image/jpeg" >
                        </div>
                        <br>

                        <div style="padding-bottom:40px;">
                            <input type="submit" name="entrar" value="C R E A R" class="boton_personalizado">
                        </div>
                    </div>
                </div>

            </div>

    </form>

    <style>
    .contenedor{
        text-align:center;
        margin:5% auto;
    }

    .formulario{
        width:48%;
        background-color: #f2f2f2;
        margin:auto;
    }

    .contenido_form{
        width: 710px;
        margin:auto;
    }

    .boton_personalizado{
        text-align: center;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        width: 160px;
        height: 40px;
        color: white;
        background-color: #1EAAF1;
        border: none;
        border-radius: 2px;
    }


    .boton_personalizado:hover{
        background-color: #5e5e5e;
    }

    .titulo{
        color: black;
        position: absolute;
        left:648px;
        top:50px;
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