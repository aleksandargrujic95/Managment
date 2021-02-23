<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BG-Konzole</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
       
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="https://kit.fontawesome.com/6feaa94670.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @notifyCss
    </head>
    <body class="therichpost-light-grey" onscroll="scroll();">
        <!-- Top container -->
<div class="therichpost-bar therichpost-top therichpost-white therichpost-large" style="z-index:4" >
  <button class="therichpost-bar-item therichpost-button therichpost-hide-large therichpost-hover-none therichpost-hover-text-light-grey" onclick="therichpost_open()"><i class="fa fa-bars"></i>  Menu</button>
  <span class="therichpost-bar-item therichpost-left">
    <img src="{{asset('images/logo.png')}}" alt=""></span>
  <span class="therichpost-bar-item therichpost-right">
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn" type="submit">
            {{ __('Logout') }}
        </button>
    </form>
  </span>
  <span class="therichpost-bar-item therichpost-right"><a href="/notifications"><i class="fa fa-bell" data-toggle="tooltip" title="Edit">{{$notifications_numb == 0 ? '' : $notifications_numb}}</i></a></span>
</div>
<!-- Sidebar/menu -->
<nav class="therichpost-sidebar therichpost-collapse therichpost-white therichpost-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  
  <div class="therichpost-container">
  </div>
  <div class="therichpost-bar-block">
    <a href="#" class="therichpost-bar-item therichpost-button therichpost-padding-16 therichpost-hide-large therichpost-dark-grey therichpost-hover-black" onclick="therichpost_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="/" class="therichpost-bar-item therichpost-button therichpost-padding therichpost-blue"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
    <a href="/reservations" class="therichpost-bar-item therichpost-button therichpost-padding"><i class="fa fa-calendar fa-fw"></i>  Reservations</a>
    <a href="/categories" class="therichpost-bar-item therichpost-button therichpost-padding"><i class="fa fa-list fa-fw"></i>  Categories</a>
    <a href="/customers" class="therichpost-bar-item therichpost-button therichpost-padding"><i class="fa fa-users fa-fw"></i>  Customers</a>
    <a href="/products" class="therichpost-bar-item therichpost-button therichpost-padding"><i class="fa fa-gamepad fa-fw"></i>  Products</a>
    <a href="/product/inventory" class="therichpost-bar-item therichpost-button therichpost-padding"><i class="fa fa-clipboard-list fa-fw"></i>  Inventory</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="therichpost-overlay therichpost-hide-large therichpost-animate-opacity" onclick="therichpost_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
    {{ $slot }}

</div>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

var y = window.scrollY;
// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");
// Toggle between showing and hiding the sidebar, and add overlay effect
function therichpost_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}
// Close the sidebar with the close button
function therichpost_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
function scroll(){
  if(y >= '65px'){
    mySidebar.style.top = 0;
  }
}
</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <x:notify-messages />
    @notifyJs

 </body>

</html>
