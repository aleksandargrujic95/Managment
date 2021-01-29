<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Create Customer</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
        <form class="form-width" method="POST" action="/customers">
            @csrf
            <div class="form-group">
              <label for="customerName">Customer name</label>
              <input type="text" class="form-control" placeholder="Enter Customer name" name="name">
              <label for="customerName">Customer Place Of Living</label>
              <input type="text" class="form-control" placeholder="Enter Customer Place Of Living" name="opstina">
              <label for="customerName">Customer Number Of Rent</label>
              <input type="text" class="form-control" placeholder="Enter Customer Number Of Rent" name="reservations">
              <label for="customerName">Customer Phone Number</label>
              <input type="text" class="form-control" placeholder="Enter Customer Phone Nuber" name="phone_number">
              <label for="customerName">Customer Address</label>
              <input type="text" class="form-control" placeholder="Enter Customer Address" name="address">
              <label for="customerName">Customer Money Spent</label>
              <input type="text" class="form-control" placeholder="Enter Customer Money Spent" name="money_spent">
              <label for="customerName">Customer Comment</label>
              <input type="text" class="form-control" placeholder="Enter Customer Comment" name="Comment">
              <label for="customerName">Customer Jbk</label>
              <input type="text" class="form-control" placeholder="Enter Customer JBK" name="jbk">
              <input hidden type="text" class="form-control" placeholder="Enter Customer Comment" name="konzola">
              <input hidden type="text" class="form-control" placeholder="Enter Customer Comment" name="reservations">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
</x-layout>
