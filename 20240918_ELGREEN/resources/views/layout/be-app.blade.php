<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title','ADMIN') | ELGREEN</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('image/elgreen.png')}}" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    <!-- Fonts and icons -->
    <script src="{{asset('kaiadmin-lite-1.2.0/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{asset('kaiadmin-lite-1.2.0/assets/css/fonts.min.css')}}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('kaiadmin-lite-1.2.0/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('kaiadmin-lite-1.2.0/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('kaiadmin-lite-1.2.0/assets/css/kaiadmin.min.css')}}" />
    @stack('csss')

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layout.be-sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            @include('layout.be-header')

            <div class="container">
                @yield('content')
            </div>

            <footer class="footer">
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('kaiadmin-lite-1.2.0/assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('kaiadmin-lite-1.2.0/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('kaiadmin-lite-1.2.0/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('kaiadmin-lite-1.2.0/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('kaiadmin-lite-1.2.0/assets/js/kaiadmin.min.js')}}"></script>
    @stack('jss')
    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
</body>

</html>