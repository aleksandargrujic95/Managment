<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i> Customer</b></h5>
      </header>
      <div class="container">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-xl-9">
                  <h2>Manage <b>Customer</b></h2>
                </div>
                <div class="col-xs-6 ">
                  <a href="/product/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Product</span></a>					
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
                  <th>Comment</th>
                  <th>Loyality</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>   
                      <td><img src="{{$avatar->create($customer->name)->toBase64()}}"></td>            
                      <td>{{$customer->id}}</td>    
                      <td>{{$customer->name}}</td>
                      <td>{{$customer->address}}</td>
                      <td>{{$customer->address2}}</td>
                      <td>{{$customer->place}}</td>
                      <td>{{$customer->phone_number}}</td>
                      <td>{{$customer->phone_number2}}</td>
                      <td>RSD {{$customer->money_spent}}</td>
                      <td>{{$customer->number_of_rent}}</td>
                      <td>{{$customer->comment}}</td>
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
                      @csrf
                      <button class="rsvr-btn" type="submit" class="delete" ><i class="fa fa-calendar" aria-hidden="true"  title="Submit"></i></button>
                    </form>
                  </td>
                </tr>              
              </tbody>
              
            </table>
        </div>        
        </div>

        <div class="container">
            <div class="table-responsive">
              <div class="table-wrapper">
                <div class="table-title">
                  <div class="row">
                    <div class="col-xl-9">
                      <h2>All <b>Reservations</b></h2>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Number:</th>
                      <th>Customer:</th>
                      <th>Product:</th>
                      <th>Status:</th>                              
                      <th>Price:</th>
                      <th>Date of rent:</th>
                      <th>Date of return:</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($customerReservations as $reservation)
                    <tr class="{{ $reservation->price == 0 ? 'gratis' : '' }}">             
                          <td>{{$reservation->id}}</td>    
                          <td>{{$reservation->customer->name}}</td>
                          <td>{{$reservation->product->name}}</td>
                          <td>{{($reservation->active) ? 'Collected'  : "Active"}}</td>
                          <td>{{$reservation->price == 0 ? 'gratis' : number_format($reservation->price, 2, ',', '.') }}</td>
                          <td>{{$reservation->date_of_rent->toFormattedDateString()}}</td>
                          <td>{{$reservation->date_of_return->toFormattedDateString()}}</td>
                      <td class="action-td">
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="edit" ><i class="fa fa-pencil"  title="Edit"></i></a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="dlt-form">
                          @csrf
                          @method('DELETE')
                          <button class="dlt-btn" type="submit" class="delete" ><i class="fa fa-trash-o" aria-hidden="true"  title="Delete"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                  
                </table>
      
            </div>        
            </div>
     
  </x-layout>