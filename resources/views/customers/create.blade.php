<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Create Customer</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom customers-form">
          <form class="form-width" method="POST" action="/customers">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName4">Customer Name</label>
                <input type="text" class="form-control" placeholder="Customer Name" name="name">
              </div>
              <div class="form-group col-md-6">
                  <label for="place">Select Place</label>
                  <select name="opstina" class="form-control" id="place">
                    <option selected>Choose...</option>
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
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" placeholder="Customer Address" name="address">
            </div>
            <div class="form-group">
              <label for="inputNumber">Number Of Rent</label>
              <input type="text" class="form-control" placeholder="Customer Number Of Rent" name="reservations">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPhone">Phone Number</label>
                <input type="text" class="form-control" placeholder="Customer Phone Nuber" name="phone_number">
              </div>
              <div class="form-group col-md-4">
                <label for="inputComment">Comment</label>
                <input type="text" class="form-control" placeholder="Comment" name="Comment" value="">
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Jbk</label>
                <input type="text" class="form-control" placeholder="" name="jbk">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputMoney">Money Spent</label>
                <input type="text" class="form-control" name="money_spent">
              </div>
                <input hidden type="text" class="form-control" placeholder="Customer Comment" name="konzola" value="/">
                <input hidden type="text" class="form-control" placeholder="Customer Comment" name="reservations" value="/">
                <input hidden type="text" class="form-control" placeholder="Customer Number Of Rent" name="number_of_rent" value="0">
            </div>
            <button type="submit" class="btn btn-primary">Create Customer</button>
          </form>
          @if ($errors->any())
            <div class="alert alert-danger error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
      
</x-layout>
