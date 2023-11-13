<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta property="og:url" content="{!! $meta_seo['url'] !!}" />
    <meta property="og:image" content="{!! $meta_seo['img'] !!}" />
    <meta property="og:title" content="{{ str_replace('"', '', $meta_seo['title']) }}"/> --}}
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
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/style-new.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
        @include('layout_user.common_page.header')
    <!-- End Header -->

    <main class="main-wrapper">
        <!-- Start Slider Area -->
       
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
  
    <div id="fb-root"></div>
     <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="IPtK6ERc"></script>
    <script type="text/javascript">
        function formatPrice(price) {
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    
        $(document).ready(function() {
            $('body').on('click', '#show-product', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    $('#quick-view-modal').modal('show');
                    
                    $('#product_images_1').attr('src',data.product.img_main);
                    $('#product_images_2').attr('src', data.product.img_main2);
                    $('#product_name').text(data.product.product_name);
                    $('#product_price').html(formatPrice(data.product.product_price) + ' VNĐ');
                    $('#product_des').html(data.product.product_des);
                    $('#product_id').val(data.product.product_id);
                });
            });
        });
    </script>
     <script>
        // Lấy thẻ select bằng id
        const selectElement = document.getElementById('input_filter');
        // Thêm sự kiện thay đổi giá trị vào thẻ select
        selectElement.addEventListener('change', function() {
            // Tự động gửi biểu mẫu khi có sự thay đổi
            this.form.submit(); // 'this' là thẻ select
        });
    </script>
</body>

</html>
