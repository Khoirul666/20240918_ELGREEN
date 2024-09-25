<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | ELGREEN</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('image/elgreen.png')}}" />

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3-dist\css\bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3-dist\css\bootstrap.min.css')}}">
    @stack('css')
</head>

<body>
    <!-- Start Navbar Area -->
    <!-- End Navbar Area -->

    @yield('content')

    <link rel="stylesheet" href="{{asset('js/custom.js')}}">
    <script src="{{asset('bootstrap-5.3.3-dist\js\bootstrap.js')}}"></script>
    <script src="{{asset('bootstrap-5.3.3-dist\js\bootstrap.min.js')}}"></script>
    @stack('js')
</body>

</html>