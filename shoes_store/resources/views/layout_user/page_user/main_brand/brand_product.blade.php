@extends('welcome')
@section('content')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Brand</li>
                            </ul>
                            <h3 class="title"> THƯƠNG HIỆU SẢN PHẨM</h3>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top">
                            <div class="row">
                                <div class="col-lg-9">
                                </div>
                                <div class="col-lg-3">
                                    <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                        <!-- Start Single Select  -->
                                        <form action="{{ URL::to('filter_brand') }}" method="get">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="brand_id" value="{{$brand_id}}">
                                            <select class="single-select" id="input_filter" name="locsanpham">
                                                <option value="desc_price_pro">Giá từ cao tới thấp</option>
                                                <option value="asc_price_pro">Giá từ thấp tới cao</option>
                                                <option value="desc_product">Sản phẩm mới</option>
                                                <option value="esc_product">Sản phẩm cũ</option>
                                            </select>
                                        </form>
                                        <!-- End Single Select  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row--15">
                    @foreach ($list_product as $item)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="axil-product product-style-one has-color-pick mt--40">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" id="show-product"
                                        data-url="{{ route('home.show', $item->product_id) }}">
                                        <img src="{{ asset($item->img_main) }}" alt="Product Images" class="img_product">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">

                                            <li class="select-option"><a href="javascript:void(0)" data-bs-toggle="modal"
                                                    id="show-product"
                                                    data-url="{{ route('home.show', $item->product_id) }}">Add to Cart</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="javascript:void(0)" data-bs-toggle="modal"
                                                id="show-product"
                                                data-url="{{ route('home.show', $item->product_id) }}">{{ $item->product_name }}</a>
                                        </h5>
                                        <div class="product-price-variant">
                                            <span
                                                class="price current-price">{{ number_format($item->product_price, 0, ',', '.') }}
                                                VNĐ</span>
                                            {{-- <span class="price old-price">$30</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="text-center pt--30">
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                </div>
            </div>
            <!-- End .container -->
        </div>

        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->
    </main>
@endsection
