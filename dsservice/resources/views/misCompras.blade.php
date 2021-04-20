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
  border: 15px solid purple;
  padding: 50px;
  margin: 20px;
 
}

.button {
    position: absolute;
    left: 22%;
}
</style>
 
        <div style="text-align:center; height:8%; margin-top:1%">
           @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
              <div class="container">
                <form 
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <h4 class="text"> {{ $myPurchase->service->name }} </h>
                    <input type="hidden" name="name" value="{{ $myPurchase->id }}" style="height:35px;">
                    <input type="submit" class="button" name="delete" value="Borrar" style="height:35px;" 
                        formaction="{{ action('WebController@deletePurchase') }}">
                </form>
              </div>
            @endforeach
        </div>

@endsection