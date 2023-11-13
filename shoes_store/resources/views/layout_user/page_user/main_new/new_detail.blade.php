@extends('welcome')
@section('content')
    <main class="main-wrapper">
        <!-- Start Blog Area  -->
        <div class="axil-blog-area axil-section-gap">
            <div class="axil-single-post post-formate post-standard">
                <div class="container">
                    <div class="content-block">
                        <div class="inner">
                            <div class="post-thumbnail">
                                <img src="{{ asset($news->new_img) }}" alt="blog Images">
                            </div>
                            <!-- End .thumbnail -->
                        </div>
                    </div>
                    <!-- End .content-blog -->
                </div>
            </div>
            <!-- End .single-post -->
            <div class="post-single-wrapper position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="d-flex flex-wrap align-content-start h-100">
                                <div class="position-sticky sticky-top">
                                    <div class="post-details__social-share">
                                        <span class="share-on-text">Share on:</span>
                                        <div class="social-share">
                                            <div class="fb-share-button" data-href="http://127.0.0.1:8000/" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={!! $curent !!}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="#"><i class="fab fa-discord"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 axil-post-wrapper">
                            <div class="post-heading">
                                <h2 class="title">{{ $news->new_title }}</h2>
                                <div class="axil-post-meta">
                                    <div class="post-meta-content">
                                        <h6 class="author-title">
                                            <a href="#">Admin</a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{ $news->created_at }}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>{{ $news->new_des }}</p>
                            <p>{{ $news->new_content }}</p>

                        </div>

                        <div class="col-lg-4">
                            <!-- Start Sidebar Area  -->
                            <aside class="axil-sidebar-area">
        
                                <div class="axil-single-widget mt--40">
                                    <h6 class="widget-title">Sản phẩm</h6>
                                    <ul class="product_list_widget recent-viewed-product">
                                        <!-- Start Single product_list  -->
                                        @foreach ($product as $item)
                                        <li>
                                            <div class="thumbnail">
                                                <a  href="javascript:void(0)"
                                                data-bs-toggle="modal"
                                                id="show-product"
                                                data-url="{{route('home.show',$item->product_id) }}">
                                                    <img src="{{asset($item->img_main)}}" alt="Blog Images">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a  href="javascript:void(0)"
                                                    data-bs-toggle="modal"
                                                    id="show-product"
                                                    data-url="{{route('home.show',$item->product_id) }}">{{$item->product_name}}</a></h6>
                                                <div class="product-meta-content">
                                                    <span class="woocommerce-Price-amount amount">
                                                        {{-- <del>$30</del> --}}
                                                        {{ number_format($item->product_price, 0, ',', '.') }} VNĐ
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                     
                                    </ul>
        
                                </div>
                                <!-- End Single Widget  -->
                            </aside>
                            <!-- End Sidebar Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

    </main>
@endsection
