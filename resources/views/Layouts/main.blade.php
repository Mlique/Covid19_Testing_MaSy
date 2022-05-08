<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> ZikClinic</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/slider/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/slider/css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/style.css') }}" />
</head>

<body>
    <header id="menu-jk">
        <nav class="">
            <div class="container">
                <div class="row nav-ro">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <img src="assets/images/logo.png" alt="">
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i
                                class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-7 col-md-8 d-none d-md-block no-padding">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about_us.html">About Us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="events.html">Events</a></li>
                            <li><a href="faqs.html">FAQ's</a></li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block">
                        <a href="{{ route('auth') }}" class="btn btn-success">Request A Test</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="slider">
        @yield('content')
    </div>
    <div class="copy">
        <div class="container">
            <a href="https://www.smarteyeapps.com/">2021 &copy; All Rights Reserved | Designed and Developed by
                ZikClinic</a>

            <span>
                <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
            </span>
        </div>

    </div>

</body>

<script src="{{ URL::to('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
<script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ URL::to('assets/plugins/slider/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::to('assets/js/script.js') }}"></script>


</html>
