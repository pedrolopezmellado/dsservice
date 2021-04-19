@extends("master")

@section('title', 'homeRegistrado')

@section('head')
    <div>
        <div style="text-align:left; height:15%">
            <a href="{{ action('WebController@showRegistro') }}" >Registro</a>
            <input type="checkbox" id="check">
            <label for="check"> 
             <i id="btn"> Pincha Aquí</i>
             <i id="cancel"> Salir Aquí</i>

            </label>    

        </div>
        <div class="sidebar">
        <center>
        <h4> Juanes </h4>
        <a href="{{ action('WebController@eliminarUsuario') }}" >Darme de baja</a>

        </center>
        </div>
    </div>
@endsection

@section('search')
    <div style="text-align:center; height:8%">
        

    </div>

@endsection

<style>
    .sidebar{
        background: #1EAAF1;
        height: 100%;
        width: 100%;
        right: 250px;
        width: 250px;
        transition: right 0.4s ease;
    }

    .sidebar.show{
        right: 0;
    }

    #check{
    }

    label #btn, label #cancel{
        cursor: pointer;
    }

    label #cancel{
        color: red;
    }

    #check:checked ~ .sidebar{ 
        color: white;
    }

</style>

<script>
$('.btn').checked(function(){
    $('.sidebar').toggleClass("show");
});

</script>
