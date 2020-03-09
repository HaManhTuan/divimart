<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>{{ $dataConfig->title }}</title>
    <meta charset="UTF-8">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="{{ $dataConfig->description }}">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('public/uploads/images/config/'.$dataConfig->icon)}}" rel="shortcut icon"/>

    <!-- Google Font -->
     <link rel="stylesheet" href="{{ asset('public/frontend/css/font.css') }}"/>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/flaticon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/slicknav.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/admin/css/animate.css')}}">
    <script src="{{ asset('public/frontend/js/jquery-3.2.1.min.js') }}"></script>


</head>
  <body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('layouts.home.header')
    @yield('content')
    @include('layouts.home.footer')
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>
  </body>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/wow.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/notify.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
	<script>
	  new WOW().init();
	</script>
      <script>
      mybutton = document.getElementById("myBtn");
      window.onscroll = function() {scrollFunction()};
      function scrollFunction() {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
  </script>
</html>

