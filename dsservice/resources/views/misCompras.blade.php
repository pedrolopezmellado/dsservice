@extends("master")

@section('title', 'Lista de mis compras')

@section('content')

<style>
.container {
        margin: 0 auto;
        padding: 10px;
    }

</style>
 
        <div style="text-align:center; height:8%; margin-top:1%">
            <div>
            @csrf      
            
            <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
                        <div class="container" name='name'>
                            {{ $myPurchase->service->name }}
                            <input type="hidden" name="name" value="{{ $myPurchase->id }}" style="height:35px;">
                            <input type="submit" name="delete" value="Borrar" style="height:35px;" 
                                 formaction="{{ action('WebController@deletePurchase') }}">
                          
                        </div>
                    @endforeach
                    
            </form>

            </div>

        </div>

@endsection