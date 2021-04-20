@extends("master")

@section('title', 'Editar Servicio')

@section('content')

    <form action="{{ action('WebController@modifyService') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div class="formulario">
                <div >
                <label> Editar servicio</label>
                </div>
                </br>
                <div >
                <label style="color:#1EAAF1"> ¿Te has olvidado algún detalle? Modifica aquí las características de tu servicio.</label>
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
                <input type="submit" name="entrar" value="E D I T A R">
                </div>

            </div>

    </form>

    <style>
    .formulario{
        text-align:center;
        margin:10% auto;
    }
    </style>

@endsection