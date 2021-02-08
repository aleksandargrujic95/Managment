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
                  <div class="col-xl-9">
                    <h2>Manage <b>Customers</b></h2>
                  </div> 
                  <div class="col-xs-6 ">
                    <a href="/customers/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Customer</span></a>					
                  </div>
              </div>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Jbk</th>
                  <th>Place</th>
                  <th>Addresss</th>
                  <th>Name</th>                 
                  <th>Phone number</th>
                  <th>Money spent</th>
                  <th>Comment</th>
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
                        <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->jbk}}</a>
                      </td>
                      <td>
                        <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->opstina}}</a>
                      </td>
                      <td>
                        <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->address}}</a>
                      </td>
                      <td>
                        <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->name}}</a>
                      </td>
                      <td>
                        <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->phone_number}}</a>
                      </td>
                      <td>
                        <a href="{{ route('customers.show', $customer->id) }}">$ {{$customer->money_spent}}</a>
                      </td>
                      <td>
                        <a href="{{ route('customers.show', $customer->id) }}"> {{$customer->comment}}</a>
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
                      <input type="text" hidden value="{{$customer->id}}" name="customer_id">
                      <button class="rsvr-btn" type="submit" class="delete" ><i class="fa fa-calendar" aria-hidden="true"  title="Submit"></i></button>
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