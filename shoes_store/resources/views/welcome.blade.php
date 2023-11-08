<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.min.css')}}">
    <title>Document</title>
</head>

<body>
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
        @include('layout_user.common_page.header')
    <!-- End Header -->

    <main class="main-wrapper">
        <!-- Start Slider Area -->
        @include('layout_user.common_page.banner')
        <!-- content -->
        @yield('content')
        <!-- content  -->
    </main>

    <!-- Product Quick View Modal Start -->
    
    <!-- Product Quick View Modal End -->
    @include('layout_user.common_page.footer')
    <!-- Header Search Modal End -->
    @include('layout_user.common_page.modal')

    <!-- JS
============================================ -->
    <script src="{{asset('frontend/assets/js/vendor/modernizr.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/js.cookie.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>

</html>
