<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Update Product</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
        <form class="form-width" method="POST" action="/reservations">
          @csrf
          <div class="form-group">
            <label for="start">Start date:</label>

            <input type="date" id="start" name="date_of_rent" value="today_parsed">

            <label for="start">End date:</label>
            <input type="date" id="start" name="date_of_return" value="today_parsed">
            {{-- <label for="start">Customer:</label>
            <input type="text" value="{{$customer[0]->name}}">
            <input type="text" value="{{$customer[0]->jbk}}">
            <input type="text" value="{{$customer[0]->phone_number}}">
            <input type="text" value="{{$customer[0]->address}}"> --}}
            <input type="text" name="active" value="0">
            <input type="text" name="customer_id" hidden value="{{$customer_id}}">
            <label for="price">Price:</label>
            <input type="text" name="price">
            <div class="form-group" >
              <div class="col-auto my-1 drpdwn">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Product:</label>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='product_id'>
                    <option selected>Choose...</option>
                      @foreach ($products as $product)
                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
</x-layout>