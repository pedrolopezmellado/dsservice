@extends("master")

@section('title', 'Lista de categorias')

@section('content')

 
        <div style="text-align:center; height:8%; margin-top:1%">
            <div>
            @csrf       
            <select name="categoria" > 
            @foreach($categorias as $categoria){
                    <option value="{{$categoria->name}}" >{{$categoria->name}}</option> 
                }
            @endforeach
            </select>
            
            <form action="{{ action('WebController@createCategory') }}"
                    method="PUT"
                    enctype="multipart/form-data">
                    @csrf 

                <input type="text" name="newname" placeholder="Escribe el nombre a modificar..." style=" height:35px; width:30%">
                <input type="submit" name="modificar" value="Modificar" style="height:35px;">

            </form>
            
                <form action="{{ action('WebController@deleteCategory') }}"
                    method="DELETE"
                    enctype="multipart/form-data">
                <input type="submit" name="delete" value="Borrar" style="height:35px;">
                </form>

            </div>

          <form action="{{ action('WebController@createCategory') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf       

                <div style= "margin-top:1%">
                <input type="text" name="name" placeholder="Escribe el servicio que quieras añadir..." style=" height:35px; width:30%">
                    <input type="submit" name="crear" value="Crear" style="height:35px;">
                </div>

           </form>

        </div>

@endsection