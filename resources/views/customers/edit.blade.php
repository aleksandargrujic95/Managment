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
            @method('PUT')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName4">Customer Name</label>
                <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{$customer->name}}">
              </div>
              <div class="form-group col-md-6">
                  <label for="place">Select Place</label>
                  <select name="place" class="form-control" id="place">
                    <option selected >{{$customer->place}}</option>
                    <option value="Čukarica">Čukarica</option>
                    <option value="Novi Beograd">Novi Beograd</option>
                    <option value="Palilula">Palilula</option>
                    <option value="Rakovica">Rakovica</option>
                    <option value="Savski venac">Savski venac</option>
                    <option value="Stari grad">Stari grad</option>
                    <option value="Voždovac">Voždovac</option>
                    <option value="Vračar">Vračar</option>
                    <option value="Zemun">Zemun</option>
                    <option value="Zvezdara">Zvezdara</option>
                    <option value="Barajevo">Barajevo</option>
                    <option value="Grocka">Grocka</option>
                    <option value="Surčin">Surčin</option>
                  </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" placeholder="Customer Address" name="address" value="{{$customer->address}}">
              </div>
              <div class="form-group col-md-4">
                <label for="inputAddress">Address 2</label>
                <input type="text" class="form-control" placeholder="Customer Address 2" name="address2" value="{{$customer->address2}}">
              </div>
              <div class="form-group col-md-4">
                <label for="find_us">How Did You Hear About Us</label>
                  <select name="find_us" class="form-control" id="find_us">
                    <option selected>Choose...</option>
                    <option value="web">Web</option>
                    <option value="social_network">Social Network</option>
                    <option value="add">Add</option>
                    <option value="referal">Referal</option>
                  </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputNumber">Number Of Rent</label>
                <input type="number" class="form-control" name="number_of_rent"  value="{{$customer->number_of_rent}}">
              </div>
              <div class="form-group col-md-3">
                <label for="inputMoney">Money Spent</label>
                <input type="number" class="form-control" name="money_spent" value="{{$customer->money_spent}}">
              </div>
              <div class="form-group col-md-3">
                <label for="inputReferalId">Referal ID</label>
                <input type="text" class="form-control" name="referal_id" value="{{$customer->referal_id}}">
              </div>
              <div class="form-group col-md-3">
                <label for="inputReferal">Referal Points</label>
                <input type="number" class="form-control" name="referal_points" value="{{$customer->referal_points}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputComment">Comment</label>
                <input type="text" class="form-control" placeholder="Comment" name="comment"  value="{{$customer->comment}}">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPhone">Phone Number</label>
                <input type="text" class="form-control" placeholder="Customer Phone Number" name="phone_number" value="{{$customer->phone_number}}">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPhone">Second Phone Number</label>
                <input type="text" class="form-control" placeholder="Second Phone Number" name="phone_number2" value="{{$customer->phone_number2}}">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Customer</button>
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
