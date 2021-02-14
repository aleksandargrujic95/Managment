<x-layout>
<!-- !PAGE CONTENT! -->
<div class="therichpost-main" style="margin-left:300px;">
  <!-- Header -->
  <header class="therichpost-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="therichpost-row-padding therichpost-margin-bottom">
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-red therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-users therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
          <h3>{{$customers_numb}}</h3>
        </div>
        <div class="therichpost-clear"></div>
        <h4>Customers</h4>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-blue therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-calendar therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
          <h3>{{$reservations_numb}}</h3>
        </div>
        <div class="therichpost-clear"></div>
        <h4>Reservations</h4>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-teal therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-gamepad therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
          <h3>{{$products_numb}}</h3>
        </div>
        <div class="therichpost-clear"></div>
        <h4>Products</h4>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-pink therichpost-text-white therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-list therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
          <h3>{{$categories_numb}}</h3>
        </div>
        <div class="therichpost-clear"></div>
        <h4>Categories</h4>
      </div>
    </div>
    {{-- <div class="container-fluid">
      <div class="row chart-div">
        <div class="col-md-4">{!! $chart_reservations->container() !!}</div>
        <div class="col-md-4">{!! $chart_customers->container() !!}</div>
      </div>
    </div> --}}
  </div>

    {{-- <script src="{{ $chart_reservations->cdn() }}"></script>

    {{ $chart_reservations->script() }}

    <script src="{{ $chart_customers->cdn() }}"></script>

    {{ $chart_customers->script() }} --}}
</x-layout>