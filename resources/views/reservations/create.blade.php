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
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="example-date-input" >Date of Rent</label>
              <input class="form-control" type="date" name="date_of_rent" value="today_parsed" id="example-date-input">
            </div>
            <div class="form-group col-md-6">
              <label for="example-date-input" >Number of days</label>
              <input class="form-control" type="number" name="number_of_days"  id="example-date-input">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">Price:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">RSD</span>
                  <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" value="0">
                </div>
            </div>
            <div class="form-group col-md-6">
              <p>Delivery:</p>
              <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="deliverer" id="inlineRadio1" value="Milos">
                <label class="form-check-label" for="inlineRadio1">Milos</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="deliverer" id="inlineRadio2" value="Steva">
                <label class="form-check-label" for="inlineRadio2">Steva</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 drpdwn">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Product:</label>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='product_id'>
                <option selected>Choose...</option>
                  @foreach ($products as $product)
                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-3 drpdwn">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Other Product:</label>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='other_prod_1'>
                <option selected>Choose...</option>
                  @foreach ($products as $product)
                      <option value="{{ $product->name }}">{{ $product->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-3 drpdwn">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Other Product:</label>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='other_prod_2'>
                <option selected>Choose...</option>
                  @foreach ($products as $product)
                      <option value="{{ $product->name }}">{{ $product->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="example-date-input" >Number of Joysticks</label>
              <input class="form-control" type="number" name="joystick">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputComment">Comment</label>
              <input type="text" class="form-control" name="comment">
            </div>
          </div>  
          <div class="form-check col-md-4">
            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="gratis" value="1" >
            <label class="form-check-label" for="flexCheckChecked">
              Gratis
            </label>
          </div>    
            <input hidden type="text" name="active" value="0">
            <input type="text" name="customer_id" hidden value="{{$customer_id}}">
          <button type="submit" class="btn btn-primary">Create Reservation</button>
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