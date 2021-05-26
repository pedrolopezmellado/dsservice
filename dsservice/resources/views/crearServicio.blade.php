@extends("master")

@section('title', 'Crear Servicio')
    <div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="images/cerrar.png" width="40px" height="40px">
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
            <div class="formulario">
                
                <div >
                <label style="color:#1EAAF1"> Publica un servicio en la plataforma y deja que todo el mundo pueda ver lo que ofreces. </br> 
                Un solo lugar, millones de talentos creativos</label>
                </div>
                </br>
                </br>
                <div >
                <input  type="text" name="name" placeholder="Nombre del servicio" value="{{old ('name')}}" required></textbox>
                </div>
                </br>
                <div >
                <input  type="text" name="direccion" placeholder="Dirección" value="{{old ('direccion')}}" required></textbox>
                </div>
                </br>
                <div >
                <input type="text" name="preciomin" placeholder="Precio mínimo(€)" value="{{old ('preciomin')}}" required>
                </div>
                </br>
                <div >
                <input type="text" name="preciomax" placeholder="Precio máximo(€)" value="{{old ('preciomax')}}" required>
                </div>
                </br>
                
                @if($errors->any())
                    <div style="color: red;">
                        <span> Los precios deben ser numéricos </span> </br>
                    </div>
                @endif
                <select style="height: 35px;" name="categorias" id="categorias" required>
                        <option value='' selected="selected" >Ninguna</option> 
                    @foreach($categorias as $categoria)
                        <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                    @endforeach
                </select>
                </br>
                </br>
                <div>
                <textarea style="width:23%; height:17%;" name="descripcion" placeholder="Escriba una breve descripción del servicio..." value="{{old ('descripcion')}}" required></textarea>
                </div>
                </br>
                <div>
                <input type="file" name="image" accept="image/png, image/jpeg" >
                </div>

</br>
                <div >
                <input type="submit" name="entrar" value="C R E A R" class="boton_personalizado">
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