@extends("master")

@section('title', 'Editar Servicio')
<div style="margin-left: 250px; margin-top: 30px;">
        <a href ="{{ action('HomeController@index') }}">
            <img src="{{asset('images/cerrar.png') }}" width="30px" height="25px">
        </a>
    </div>
@section('content')

    <form action="{{ action('HomeController@modifyService') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="titulo">
            <label> Editar servicio</label>
        </div>

        <div class="contenedor">
            <div>
                <label style="color:#1EAAF1"> ¿Te has olvidado algún detalle? Modifica aquí las características de tu servicio.</label>
            </div>
            <br></br>
            <br></br>
            
            <div>
                <input type="hidden" name="id" value="{{ $service->id }}" >
            </div>
            <div class="formulario">
                <div class="contenido_form">
                    <div style="padding-top:60px;">
                        <input style="height:40px; width:340px; margin-right:20px; padding-left:10px;" type="text" name="name" placeholder="{{ $service->name }}" value="{{old ('name')}}"></textbox>
                        <input style="height:40px; width:340px; padding-left:10px;" type="text" name="direccion" placeholder="{{ $service->direction }}" value="{{old ('direccion')}}"></textbox>
                    </div>
                    <br></br>
                    
                    <div>
                        <input style="height:40px; width:134px; margin-left:3px; padding-left:10px;" type="text" name="preciomin" value="{{old ('preciomin')}}" placeholder="Precio mínimo"></textbox>
                        &nbsp &nbsp &nbsp &nbsp -  &nbsp &nbsp &nbsp
                        <input style="height:40px; width:133px; margin-right:20px; margin-left:2px; padding-left:10px;" type="text" name="preciomax" value="{{old ('preciomax')}}" placeholder="Precio máximo"></textbox>

                        <select style="height: 40px; width:340px; padding-left:10px;" name="categorias" id="categorias" >
                                <option value='Ninguna' selected="selected" >Ninguna</option> 
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
                        <textarea style="width:703px; height:150px; padding-left:10px; padding-top:10px;" name="descripcion" value="{{old ('descripcion')}}" placeholder="{{ $service->description }}"></textarea>
                    </div>
                    <br></br>

                    <div style="padding-bottom:40px;">
                        <input type="submit" name="entrar" value="E D I T A R" class="boton_personalizado">
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
        width: 730px;
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