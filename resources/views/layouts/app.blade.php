<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Preloader part start -->
    <!-- <div class="preloader">
       <div class="load">
        <hr/><hr/><hr/><hr/>
       </div>
    </div> -->
    <!--Preloader part end -->



    @yield('content')


    <script src="{{ asset('public/frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/custom.js') }}"></script>
  </body>
</html>
