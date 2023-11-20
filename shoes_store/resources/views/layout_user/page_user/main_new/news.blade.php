@extends('welcome')
@section('content')
    <div class="axil-blog-area axil-section-gap">
        <div class="container">
            <div class="row row--25">
                <div class="col-lg-8 axil-post-wrapper">
                    <!-- Start Single Blog  -->
                    @foreach ($news as $item)
                        <div class="content-blog sticky mt--60">
                            <div class="inner">
                                <div class="content">
                                    <h4 class="title"><a href="{{route('news.show',$item->new_id)}}">{{ $item->new_title }}</a></h4>
                                    <div class="axil-post-meta">
                                        <div class="post-author-avatar">
                                            <img src="{{ asset($item->new_img) }}" alt="{{ $item->new_title }}">
                                        </div>
                                        <div class="post-meta-content">
                                            <h6 class="author-title">
                                                <a href="#">Admin</a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>{{ $item->created_at }}</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <p>{{ $item->new_des }}</p>
                                    <div class="read-more-btn">
                                        <a class="axil-btn btn-bg-primary" href="{{route('news.show',$item->new_id)}}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

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

            <!-- End post-pagination -->
        </div>
        <!-- End .container -->
    </div>
@endsection
