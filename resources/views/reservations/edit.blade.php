<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-calendar"></i>Update Reservation</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
        <form class="form-width" method="POST" action="{{route('reservations.update', $reservation)}}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <div class="form-group row">
            <div class="col-md-5">
              <label for="example-date-input" class="col-7 col-form-label">Date of Rent</label>
              <input class="form-control" type="date" name="date_of_rent" value="today_parsed" id="example-date-input"  value="{{$reservation->date_of_rent}}">
            </div>
            <div class="col-md-6">
              <label for="example-date-input" class="col-7 col-form-label">Number of days</label>
              <input class="form-control" type="number" name="number_of_days"  id="example-date-input">
            </div>
            </div>
            <input hidden type="text" name="active" value="0">
            <input type="text" name="customer_id" hidden value="{{$reservation->customer_id}}">
            <br>
            <div class="form-group">
              <div class="col-md-7">
                <label for="price">Price:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">RSD</span>
                  <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$reservation->price}}">
                </div>
              </div>
            </div>
            <div class="form-group" >
              <div class="col-auto my-1 drpdwn">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Product:</label>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='product_id'>
                    <option selected>{{$reservation->product['name']}}</option>
                      @foreach ($products as $product)
                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-check col-md-4">
                  <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="gratis" value="1" >
                  <label class="form-check-label" for="flexCheckChecked">
                    Gratis
                  </label>
                </div>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</x-layout>