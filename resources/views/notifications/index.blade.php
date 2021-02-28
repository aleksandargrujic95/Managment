<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-calendar"></i> Notifications</b></h5>
      </header>
      <div class="container">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-xl-9">
                  <h2>Manage <b>Notifications</b></h2>
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover notification-table ">
              <thead>
                <tr>
                  <th>Collect Address:</th>
                  <th>Customer:</th>
                  <th>Product:</th>                             
                  <th>Price:</th>
                  <th>Customer Phone Number:</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($notifications as $notification)
                <tr>               
                      <td>{{$notification->customer->address}}</td>
                      <td>{{$notification->customer->name}}</td>
                      <td>{{$notification->product->name}}</td>
                      <td>{{$notification->price}}</td>
                      <td>{{$notification->customer->phone_number}}</td>
                  <td class="not-actions">
                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" class="dlt-form">
                      @csrf
                      @method('DELETE')
                      <button  type="submit" class="check" ><i class="fa fa-check" aria-hidden="true"  title="Done"></i></button>
                    </form>
                    <a href="/reservations/{{$notification->reservation_id}}/edit" id="edit-notification" class="btn btn-info" >extend</a>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
              
            </table>
  
        </div>        
        </div>
  </x-layout>