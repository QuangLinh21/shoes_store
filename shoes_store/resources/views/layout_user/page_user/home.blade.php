@extends('welcome')
@section('content')
    @include('layout_user.common_page.banner')
    <!-- End Categorie Area  -->
    @include('layout_user.page_user.static_home.fe_brand')
    <!-- Start Best Sellers Product Area  -->
    <div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary">New Products</span>
                    <h2 class="title">Sản phẩm mới</h2>
                </div>
                <div
                    class="new-arrivals-product-activation-2 slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                    @foreach ($news_product as $item)
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-six">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)"
                                    data-bs-toggle="modal"
                                    id="show-product"
                                    data-url="{{route('home.show',$item->product_id) }}">
                                        <img data-sal="fade" data-sal-delay="100" class="img_product"
                                            data-sal-duration="1500" src="{{ asset($item->img_main) }}"
                                            alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-price-variant">
                                            <span
                                                class="price current-price text-dark">{{ number_format($item->product_price, 0, ',', '.') }}
                                                VNĐ</span>
                                        </div>
                                        <h5 class="title_product"><a href="javascript:void(0)"
                                            data-bs-toggle="modal"
                                            id="show-product"
                                            data-url="{{route('home.show',$item->product_id) }}">{{ $item->product_name }}</a></h5>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="javascript:void(0)"
                                                        data-bs-toggle="modal"
                                                        id="show-product"
                                                        data-url="{{route('home.show',$item->product_id) }}">Buy
                                                        Product</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End  Best Sellers Product Area  -->
    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--20">
                <div class="axil-isotope-wrapper">
                    <div class="product-isotope-heading">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary">
                                 All Products</span>
                            <h2 class="title">Tất cả sản phẩm</h2>
                        </div>
                    </div>
                    <div class="row row--15 isotope-list">
                        @foreach ($all_product as $item)
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product music">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="#" href="javascript:void(0)"
                                        data-bs-toggle="modal"
                                        id="show-product"
                                        data-url="{{route('home.show',$item->product_id) }}">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="{{ asset($item->img_main) }}" class="img_product" alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="javascript:void(0)"
                                                    data-bs-toggle="modal"
                                                    id="show-product"
                                                    data-url="{{route('home.show',$item->product_id) }}">Buy
                                                        Product</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title title_product"><a
                                                href="javascript:void(0)"
                                                data-bs-toggle="modal"
                                                id="show-product"
                                                data-url="{{route('home.show',$item->product_id) }}">{{ $item->product_name }} </a>
                                            </h5>
                                            <div class="product-price-variant">
                                                <span
                                                    class="price current-price">{{ number_format($item->product_price, 0, ',', '.') }}
                                                    VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="data_Tables_paginate paging_simple_numbers mt-5">
                        {{ $all_product->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-banner-area">
        <div class="container">
            <div class="product-area pb--80">
                <div class="section-title-wrapper section-title-center pt-5">
                    <span class="title-highlighter highlighter-primary">
                        Video</span>
                    <h2 class="title">Giới thiệu về chúng tôi</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="video-banner">
                            <img src="{{ asset('frontend/assets/images/bg/bg-image-7.jpg') }}" alt="Images">
                            <div class="popup-video-icon">
                                <a href="https://www.youtube.com/watch?v=Bv-3Wx2UdbI" class="popup-youtube video-icon">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Banner Area  -->
    @include('layout_user.page_user.static_home.fe_new')
    
@endsection
