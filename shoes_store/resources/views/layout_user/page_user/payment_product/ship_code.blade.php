@extends('welcome')
@section('content')
<div class="header-top-campaign">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                    <div class="slick-slide">
                        <div class="campaign-content">
                            <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                        </div>
                    </div>
                    <div class="slick-slide">
                        <div class="campaign-content">
                            <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @php
$full_name = Session::get('full_name');
@endphp --}}
<section class="error-page onepage-screen-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                   {{-- <H3 class="text-center">Khách hàng {{$full_name}} thân mến !</H3> --}}
                   <h5>Cảm ơn bạn đã mua sản phẩm của cửa hàng chúng tôi</h5>
                   <p><i>Khi nhận hàng bạn hãy kiểm tra và phản hồi về chất lượng sản phẩm của chúng tôi nhé. Xin chân thành cảm ơn bạn !!</i></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                    <h1 style="border-bottom: 10px solid #FB60AE;">TRƯỜNG GIANG SHOP</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="service-area" style="margin-top: 30px;">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src=" {{ URL::to('../public/frontend/assets/images/icons/service1.png') }}"
                            alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Giao hàng nhanh chóng</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ URL::to('../public/frontend/assets/images/icons/service2.png') }}"
                            alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Bảo hành trong 10 ngày</h6>
                        <p>Within 10 days.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ URL::to('../public/frontend/assets/images/icons/service3.png') }}"
                            alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Hàng chính hãng</h6>
                        <p>No question ask.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ URL::to('../public/frontend/assets/images/icons/service4.png') }}"
                            alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Hỗ trợ 24/7</h6>
                        <p>24/7 Live support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
