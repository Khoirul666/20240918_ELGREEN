<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'HOME') | ELGREEN</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('image/elgreen.png') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist\css\bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-khoi.css') }}">

    <script src="https://kit.fontawesome.com/691cd9cb9a.js" crossorigin="anonymous"></script>

    @stack('csss')

</head>

<body style="background-color: #e7e7e7;">
    @include('layout.fe-navbar')
    @yield('content')


    @include('layout.fe-footer')

    <script src="{{ asset('bootstrap-5.3.3-dist\js\bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom-khoi.js') }}"></script>
    @stack('jss')
</body>

</html>
