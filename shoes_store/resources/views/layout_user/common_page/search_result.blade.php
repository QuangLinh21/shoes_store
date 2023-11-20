@extends('welcome')
@section('content')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 ">
                        <div class="inner">
                          
                            <h1 class="title">Kết quả tìm kiếm</h1>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
               
                <div class="row row--15">
                    <h5>Kết quả tìm kiếm</h5>
                    @foreach ($result as $item)
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
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="javascript:void(0)" data-bs-toggle="modal"
                                                    id="show-product"
                                                    data-url="{{ route('home.show', $item->product_id) }}">Add to Cart</a>
                                            </li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
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
              
            </div>
            <!-- End .container -->
        </div>

    </main>
@endsection
