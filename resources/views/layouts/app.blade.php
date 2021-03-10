<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f2bfbf">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Farmcoin</title>

    <!-- Scroll -->
    <script src="{{ asset('js/scroll.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <!-- Css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/awesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/index.css') }}" rel="stylesheet">
    
    <!--  toastify -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    
</head>
<body>
<div class="container" style="max-width:700px">
  <div class="headline load-hidden">
    <x-index.navbar-component :user="$user"/>
  </div>
    <div id="mySidenav" class="sidenav body1 load-hidden">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <!-- open nav -->
      <x-index.header-component :user="$user"/>
      <x-index.menu-component />
      <!-- close nav -->
    </div>
    <x-index.header-button-component />
    <main class="py-4" id="contednt">
      @yield('content')
    </main>
    <div style=" height: 10px"> </div>
    <div class = "row justify-content-center bottom load-hidden">
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
  text: "<i class='fas fa-check-circle'></i>{{ Session::get('notify') }}",
  duration: 8000,
  newWindow: true,
  close: true,
  gravity: "top",
  positionRight: true,
  backgroundColor: "#29b24b",
  stopOnFocus: true,
  onClick: function(){}
}).showToast();
@endif
@if(Session::has('notifyError'))
  Toastify({
  text: "<i class='fas fa-exclamation-triangle'></i> {{ Session::get('notifyError') }}",
  duration: 10000,
  newWindow: true,
  close: true,
  gravity: "top",
  positionRight: true,
  backgroundColor: "#c76561",
  stopOnFocus: false,
  onClick: function(){}
}).showToast();
@endif
  </script>
  <script>
    ScrollReveal().reveal('.headline', { duration: 2000 });
    ScrollReveal().reveal('.body1', { duration: 3000 });
    ScrollReveal().reveal('.body2', { duration: 3500 });
    ScrollReveal().reveal('.body3', { duration: 4000 });
    ScrollReveal().reveal('.bottom', { duration: 5000 });
    ScrollReveal().reveal('.widget', { interval: 200 });
  </script>

</body>
</html>
