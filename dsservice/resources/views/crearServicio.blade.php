@extends("master")

@section('title', 'Crear Servicio')

@section('content')

    <form action="{{ action('WebController@createService') }}"
        method="POST"
        enctype="multipart/form-data">
        
            @csrf
            <div class="formulario">
                <div >
                <label> Crear servicio</label>
                </div>
                </br>
                <div >
                <label style="color:blue"> Publica un servicio en la plataforma y deja que todo el mundo pueda ver lo que ofreces. </br> 
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

                <select name="categorias" style="height:35px;">
                    <option value="Ninguna">Ninguna</option>
                    <option value="Programacion">Programación</option>
                    <option value="Edicion">Edición</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Doblaje">Doblaje</option>
                    <option value="Coches">Coches</option>
                </select>

                <div>
                <input style="width:23%; height:17%;" type="text" name="descripcion" placeholder="Escriba una breve descripción del servicio..."></textbox>
                </div>

                <div >
                <input type="submit" name="entrar" value="C R E A R">
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