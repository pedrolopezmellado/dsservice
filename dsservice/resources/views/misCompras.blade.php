@extends("master")

@section('title', 'Lista de mis compras')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

.text {
  background-color: aqua;
  width: 420px;
  border: 8px solid purple;
  padding: 45px;
  margin-top: 60px;
 
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.button {
    position: absolute;
    margin-left:15px;
}
</style>
 
        <div>
          <div class ="row">
           @foreach( $myPurchases as $myPurchase) <!--  display:inline; -->
           <div class="column">
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
        </div>
        
        <div style="text-align:center">
        {{ $myPurchases->links() }}
        </div>
@endsection