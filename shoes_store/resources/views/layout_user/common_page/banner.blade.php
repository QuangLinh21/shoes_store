<div class="axil-main-slider-area main-slider-style-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="main-slider-content">
                    <span class="subtitle"><i class="fas fa-fire"></i>Largest NQL store</span>
                    <h1 class="title">Discover, collect, and sell extraordinary NQL</h1>
                    <div class="shop-btn">
                        <a href="shop.html" class="axil-btn btn-bg-white right-icon">Explore <i
                                class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="main-slider-large-thumb">
                    <div class="slider-thumb-activation-two axil-slick-dots">
                        @foreach ($hot_product as $item)
                        <div class="single-slide slick-slide">
                            <div class="axil-product product-style-five">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)"
                                    data-bs-toggle="modal"
                                    id="show-product"
                                    data-url="{{route('home.show',$item->product_id) }}">
                                        <img src="{{asset($item->img_main)}}"
                                            alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="javascript:void(0)"
                                            data-bs-toggle="modal"
                                            id="show-product"
                                            data-url="{{route('home.show',$item->product_id) }}">{{$item->product_name}}</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{ number_format($item->product_price, 0, ',', '.') }} VNĐ</span>
                                        </div>
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
                        @endforeach
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>