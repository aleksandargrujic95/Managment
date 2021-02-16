<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-users"></i>Loyal Customers</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom ">
        
        <div class="container-fluid rank-div">
          <div class="row">
            <div class="col"><div class="card gray-div" style="width: 22rem;">
                <div class="card-image-div">
                  <img src="{{url('/images/silver.png')}}" alt="Card image cap">
                </div>
                <div class="card-body">
                  <h5 class="rank-title">Silver Customers</h5>
                  <br>
                  
                  <p class="card-text">Customers that spent more than 20.000 and less than 30.000</p>
                </div>
                <ul class="list-group">
                  <li class="list-group-item">Number: {{$silver_customers_count}}</li>
                  
                </ul>
                <div class="card-body">
                   <form action="/customer/membership" method="GET">
                    <input type="text" name="membership" id="membership" hidden value="1">
                    <button type="submit" class="card-link btn">See All</button>
                  </form>
                </div>
            </div></div>
            <div class="col"><div class="card gray-div" style="width: 22rem;">
                <div class="card-image-div">
                  <img src="{{url('/images/gold.png')}}" alt="Card image cap">
                </div>
                <div class="card-body">
                  <h5 class="rank-title">Gold Customers</h5>
                  <br>
 
                  <p class="card-text">Customers that spent more than 30.000 and less than 50.000</p>
                </div>
                <ul>
                  <li class="list-group-item">Number: {{$gold_customers_count}}</li>
                  
                </ul>
                <div class="card-body">
                   <form action="/customer/membership" method="GET">
                    <input type="text" name="membership" id="membership" hidden value="2">
                    <button type="submit" class="card-link btn">See All</button>
                  </form>
                </div>
            </div></div>
            <div class="col"><div class="card gray-div" style="width: 22rem;">
                <div class="card-image-div">
                  <img src="{{url('/images/platinum.png')}}" alt="Card image cap">
                </div>
                <div class="card-body">
                  <h5 class="rank-title">Platinum Customers</h5>
                  <br>
                  <p class="card-text">Customers that spent more than 50.000 and less than 100.000</p>
                </div>
                <ul>
                  <li class="list-group-item">Number: {{$platinum_customers_count}}</li>
                  
                </ul>
                <div class="card-body">
                  <form action="/customer/membership" method="get">
                    <input type="text" name="membership" id="membership" hidden value="3">
                    <button type="submit" class="card-link btn">See All</button>
                  </form>
                </div>
            </div></div>
            <div class="col"><div class="card gray-div" style="width: 22rem;">
                <div class="card-image-div">
                  <img src="{{url('/images/diamond.png')}}" alt="Card image cap">
                </div>
                <div class="card-body">
                  <h5 class="rank-title">Diamond Customers</h5>
                  <br>
                  <p class="card-text">Customers that spent more than 100.000</p><br>
                </div>
                <ul>
                  <li class="list-group-item">Number: {{$diamond_customers_count}}</li>
                  
                </ul>
                <div class="card-body">
                  <form action="/customer/membership" method="GET">
                    <input type="text" name="membership" id="membership" hidden value="4">
                    <button type="submit" class="card-link btn">See All</button>
                  </form>
                </div>
            </div></div>
          </div>
        </div>
        
        {{-- <div class="therichpost-quarter">
          <div class="therichpost-container therichpost-padding-16 gray-div">
            <div class="therichpost-left"><a href="#"><i class="fas fa-crown bronze therichpost-xxxlarge"></i></a></div>
            <div class="therichpost-right">
              <h3 class="loyality-h3 bronze">Bronze</h3>
            </div>
            <div class="therichpost-clear"></div>
          </div>
        </div>
        <div class="therichpost-quarter">
          <div class="therichpost-container therichpost-padding-16 gray-div">
            <div class="therichpost-left"><a href="#"><i class="fas fa-crown silver therichpost-xxxlarge"></i></a></div>
            <div class="therichpost-right">
              <h3 class="loyality-h3 silver">Silver</h3>
            </div>
            <div class="therichpost-clear"></div>
          </div>
        </div>
        <div class="therichpost-quarter">
          <div class="therichpost-container therichpost-padding-16 gray-div">
            <div class="therichpost-left"><a href="#"><i class="fas fa-crown gold therichpost-xxxlarge"></i></a></div>
            <div class="therichpost-right">
              <h3 class="loyality-h3 gold">Gold</h3>
            </div>
            <div class="therichpost-description">
              <h3>Number of Platinum Customers: 3</h3>
            </div>
          </div>
        </div>
        <div class="therichpost-quarter">
          <div class="therichpost-container therichpost-padding-16 gray-div">
            <div class="therichpost-left"><a href="#"><i class="fas fa-crown platinum therichpost-xxxlarge"></i></a></div>
            <div class="therichpost-right ">
              <h3 class="loyality-h3 platinum">Platinum</h3>
            </div>
            <div class="therichpost-clear"></div>
          </div>
        </div> --}}
      </div>
      
     
  </x-layout>