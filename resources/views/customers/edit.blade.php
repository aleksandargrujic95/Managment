<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Create Customer</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom customers-form">
          <form class="form-width" method="POST" action="{{route('customers.update', $customer)}}">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName4">Customer Name</label>
                <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{$customer->name}}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputState4">Place</label>
                <input type="text" class="form-control" placeholder="Customer Place Of Living" name="opstina" value="{{$customer->place}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" placeholder="Customer Address" name="address" value="{{$customer->address}}">
            </div>
            <div class="form-group">
              <label for="inputNumber">Number Of Rent</label>
              <input type="text" class="form-control" placeholder="Customer Number Of Rent" name="reservations" value="{{$customer->number_of_rent}}">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPhone">Phone Number</label>
                <input type="text" class="form-control" placeholder="Customer Phone Nuber" name="phone_number" value="{{$customer->phone_number}}">
              </div>
              <div class="form-group col-md-4">
                <label for="inputComment">Comment</label>
                <input type="text" class="form-control" placeholder="Comment" name="Comment" value="{{$customer->comment}}">
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Jbk</label>
                <input type="text" class="form-control" placeholder="" name="jbk" value="{{$customer->jbk}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputMoney">Money Spent</label>
                <input type="text" class="form-control" name="money_spent" value="{{$customer->money_spent}}">
              </div>
                <input hidden type="text" class="form-control" placeholder="Customer Comment" name="konzola" value="value="{{$customer->konzola}}"">
                <input hidden type="text" class="form-control" placeholder="Customer Comment" name="reservations" value="value="{{$customer->reservations}}"">
                <input hidden type="text" class="form-control" placeholder="Customer Number Of Rent" name="number_of_rent" value="value="{{$customer->number_of_rent}}"">
            </div>
            <button type="submit" class="btn btn-primary">Create Customer</button>
          </form>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
</x-layout>
