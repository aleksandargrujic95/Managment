<x-layout>
  <!-- !PAGE CONTENT! -->
  <div class="table-body" class="therichpost-main" style="margin-left:300px;">
    <!-- Header -->
    <header class="therichpost-container" style="padding-top:22px">
      <h5><b><i class="fa fa-gamepad"></i> Customers</b></h5>
    </header>
    <div class="therichpost-row-padding therichpost-margin-bottom">
    </div>
    <div class="container">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="row">
                <div class="col-xl-3">
                  <h2>Manage <b>Customers</b></h2>
                </div> 
                <div class="col-xl-7 ">
                  <a href="/customers/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Customer</span></a>					
                </div>
                <div class="col-xl-2 ">
                  <a href="/customer/loyal" class="btn btn-success" ><i class="material-icons"></i> <span>Loyal Customers</span></a>					
                </div>
                <div class="input-group rounded col-xl-12 search-fields">
                  <form class="form-inline" method="GET" action="/customer/search">
                    <div class="form-group mx-sm-2 mb-2">
                      <label for="inputCustomerName" class="sr-only">Customer Name</label>
                      <input type="text" class="form-control" id="inputCustomerName2" placeholder="Name" name="name">
                    </div>
                    <div class="form-group mx-sm-2 mb-2">
                      <label for="inputPhoneNumber" class="sr-only">Phone Number</label>
                      <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Phone Number" name="phone_number">
                    </div>
                    <div class="form-group mx-sm-2 mb-2">
                      <label for="inputAddress" class="sr-only">Address</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address">
                    </div>
                    {{-- <div class="form-group mx-sm-2 mb-2">
                      <select name="place" class="form-control" id="place">
                        <option selected>Place</option>
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
                    </div> --}}
                    <div class="form-group mx-sm-2 mb-2">
                      <label for="inputID" class="sr-only">ID</label>
                      <input type="text" class="form-control" id="inputID" placeholder="ID" name="id">
                    </div>
                    <div class="form-group mx-sm-2 mb-2">
                      <label for="inputMoneySpent" class="sr-only">Money Spent</label>
                      <input type="text" class="form-control" id="inputMoneySpent" placeholder="Money Spent" name="money_spent">
                    </div>
                    {{-- <div class="form-group mx-sm-2 mb-2">
                      <label for="inputRentNumber" class="sr-only">Rent Number</label>
                      <input type="text" class="form-control" id="inputRentNumber" placeholder="Rent Number" name="number_of_rent">
                    </div>
                    <div class="form-group mx-sm-2 mb-2">
                      <label for="inputOldCustomers" class="sr-only">Last Rent</label>
                      <input type="text" class="form-control" id="inputMoneySpent" placeholder="Last Rent" name="last_rent">
                    </div> --}}
                    <button type="submit" class="customer-search-button" >  <i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Avatar</th>
                <th>id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Address2</th>
                <th>Place</th>                 
                <th>Phone number</th>
                <th>Phone number2</th>
                <th>Money spent</th>
                <th>Number of rents</th>
                <th>Loyality</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              <tr>             
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> <img src="{{$avatar->create($customer->name)->toBase64()}}"></a>
                    </td>    
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->id}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->name}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->address}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->address2}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->place}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->phone_number}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->phone_number2}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}">RSD {{number_format($customer->money_spent, 2, ',', '.')}}</a>
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->number_of_rent}}</a>
                    </td>
                    <td class="customer-rank">
                      <a  href="{{ route('customers.show', $customer->id) }}"> 
                        @if ($customer->money_spent < 20000)
                        @elseif($customer->money_spent >= 20000 && $customer->money_spent < 30000)
                          <img  src="{{url('/images/silver.png')}}" alt="silver">    
                        @elseif($customer->money_spent >= 30000 && $customer->money_spent < 50000)
                          <img  src="{{url('/images/gold.png')}}" alt="gold">    
                        @elseif($customer->money_spent >= 50000 && $customer->money_spent < 100000)
                          <img  src="{{url('/images/platinum.png')}}" alt="platinum">    
                        @elseif($customer->money_spent >= 100000)
                          <img  src="{{url('/images/diamond.png')}}" alt="diamond">    
                        @endif
                      </a>
                    </td>
                <td class="action-td">
                  <a href="{{ route('customers.edit', $customer->id) }}" class="edit" ><i class="fa fa-pencil"  title="Edit"></i></a>
                  <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="dlt-form">
                    @csrf
                    @method('DELETE')
                    <button class="dlt-btn" type="submit" class="delete" ><i class="fa fa-trash-o" aria-hidden="true"  title="Delete"></i></button>
                  </form>
                  <form action="{{ route('reservations.create') }}" method="GET" class="dlt-form">
                    <input type="text" hidden value="{{$customer->id}}" name="customer_id">
                    <button class="rsvr-btn" type="submit" class="delete" ><i class="fa fa-calendar" aria-hidden="true"  title="Add Reservation"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
            
          </table>
          {!! $customers->links() !!}
      </div>        
      </div>
   
</x-layout>