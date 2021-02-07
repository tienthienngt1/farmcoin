<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Farmcoin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.min.js') }}" defer></script>
    
    <!-- Css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/awesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/index.css') }}" rel="stylesheet">
    
    <!--  toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    
</head>
<body>
  
  <div class="container-fluid">
    <x-index.navbar-component />
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <!-- open nav -->
      <x-index.header-component />
      <x-index.menu-component />
      <!-- close nav -->
    </div>
    <x-index.header-button-component />
    <main class="py-4" id="contednt">
      @yield('content')
    </main>
    <div style=" height: 10px"> </div>
    <div class = "row justify-content-center">
      Bản quyền thuộc farmcoin.xyz 2020
    </div>
  </div>
  
  <script>
  
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("mySidenav").style.borderRight = "2px solid #721a1a";
}

function closeNav() {
  document.getElementById("mySidenav").style.borderRight = "none";
  document.getElementById("mySidenav").style.width = "0";
}

function snipper() {
  var x = document.getElementById("myP").innerHTML;
  document.getElementById("reg").innerHTML = x;
}

$(document).ready(function(){
	$(document).pjax('a', '#content')
});

</script>
<script>

@if(Session::has('notify'))
  Toastify({
  text: "{{ Session::get('notify') }}",
  duration: 5000,
  newWindow: true,
  close: true,
  gravity: "top",
  positionRight: true,
  backgroundColor: "#29b24b",
  stopOnFocus: true,
  onClick: function(){}
}).showToast();
@endif
  </script>
  <script src="{{ asset('js/jquery.pjax.js') }}"></script>
</body>
</html>
