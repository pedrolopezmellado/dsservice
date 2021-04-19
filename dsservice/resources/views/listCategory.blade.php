@extends("master")

@section('title', 'Lista de categorias')

@section('content')

 
        <div style="text-align:center; height:8%; margin-top:1%">
            <div>
            @csrf      
            
            <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <select name="category" id="category" >
                        <option value='Ninguna' selected="selected" >Ninguna</option> 

                    @foreach($categorias as $categoria)
                        <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                    @endforeach
                    </select>

                <input type="text" name="newname" placeholder="Escribe el nombre a modificar..." style=" height:35px; width:30%">
                <input type="submit" name="modificar" value="Modificar" style="height:35px;" formaction="{{ action('WebController@modifyCategory') }}">
                <input type="submit" name="delete" value="Borrar" style="height:35px;" formaction="{{ action('WebController@deleteCategory') }}">
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