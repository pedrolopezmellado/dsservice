@extends("master")

@section('title', 'home')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

.text {
  background-color:  #e8f8f5 ;
  width: 450px;
  border: 8px solid  #d1f2eb;
  padding: 50px;
  margin: 20px;
  font-size: 16px;
}

</style>

@section('head')
    <div>
        <div style="text-align:right; height:15%">
            <a href="{{ action('WebController@listCategory') }}" >Administrar categorías</a>
            <a href="{{ action('WebController@myPurchases') }}" >Mis Compras</a>

            <a href="{{ action('WebController@showInicioSesion') }}" >Inicio sesión</a>
            <a href="{{ action('WebController@showRegistro') }}" >Registro</a>
        </div>
    </div>
@endsection

@section('search')
    <div style="text-align:center; height:8%;">
        
        <form action="{{ action('WebController@buscador') }}"
            method="GET"
            enctype="multipart/form-data">
            
            @csrf
            <select style="height: 35px;" name="category" id="category" >
                        <option value='Ninguna' selected="selected" >Ninguna</option> 
                    @foreach($categorias as $categoria)
                        <option value='{{$categoria->name}}' >{{$categoria->name}}</option>        
                    @endforeach
            </select>
            <input type="text" name="buscador" placeholder="Escribe el servicio que necesitas..." style=" height:35px; width:30%">
            <input type="submit" name="buscar" value="Buscar" style="height:35px;">
        </form>

        <form action="{{ action('WebController@ordenarServicios') }}"
            method="POST"
            enctype="multipart/form-data">
            
            @csrf
            <select name="order" id="order" onchange="this.form.submit();" style="height: 25px;">
                <option value='SinOrden' selected="selected" >Sin orden</option> 
                <option value='PrecioAscendente' >Precio: de más bajo a más alto</option>
                <option value='PrecioDescendente' >Precio: de más alto a más bajo</option>
            </select>
            <input type="hidden" name="serviciosParaOrdenar" value="{{ $services }}">
        </form>

    </div>
@endsection

@section('content')
@foreach($services->chunk(2) as $chunk)
<div class ="row">

    @foreach( $chunk as $service) <!--  display:inline; -->
        <div class="col-md-6">
         <p class="text" > <b>{{ $service->name }} </b></p>

            </div>
            
    @endforeach
    </div>
    @endforeach
    {{ $services->appends($data)->links() }}
    
@endsection