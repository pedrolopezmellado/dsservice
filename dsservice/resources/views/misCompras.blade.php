@extends("master")

@section('title', 'Lista de mis compras')

@section('content')

 
        <div style="text-align:center; height:8%; margin-top:1%">
            <div>
            @csrf      
            
            <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
                        <div>
                            {{ $myPurchase->service->name }}
                            <input type="submit" name="delete" value="Borrar" style="height:35px;" formaction="{{ action('WebController@deletePurchase') }}">
                        </div>
                    @endforeach
                    
            </form>

            </div>

        </div>

@endsection