@extends("master")

@section('title', 'Lista de mis compras')

@section('content')

<style>
.container {
        margin: 0 auto;
        padding: 5px;
        text-align:left;
    }
.text {
  background-color: aqua;
  width: 350px;
  border: 8px solid purple;
  padding: 45px;
  margin: 20px;
 
}

.button {
    position: absolute;
    left: 21%;
}
</style>
 
        <div>
           @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
              <div class="container">
                <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <p class="text"><b> {{ $myPurchase->service->name }} 
                     <input type="submit" class="button" name="delete" value="Borrar" style="height:35px;" 
                        formaction="{{ action('WebController@deletePurchase') }}">
                    </b></p>
                    <input type="hidden" name="name" value="{{ $myPurchase->id }}" style="height:35px;">
                   
                </form>
              </div>
            @endforeach
        </div>

@endsection