@extends("master")

@section('title', 'homeAdministrador')


@section('content')

    @foreach( $users as $user) <!--  display:inline; -->
        <div style="background-color:blue; width:12%; height:22%; padding-left:10px; padding-right:10px; padding-bottom:10px;">
            {{ $user->email }}
            <form method="POST" action="{{ action('WebController@deleteUser') }}">
            @csrf

            <input type="submit" name="borrar" value="Borrar">
            <input type="hidden" name="user_id" value="{{ $user->email }}">

            </form>

        </div>
    @endforeach

@endsection