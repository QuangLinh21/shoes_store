@extends('welcome')
@section('content')
<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <h1 class="title">Trang cá nhân</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                   
                </div>
             
              
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <h5>Đơn hàng chờ giao</h5>
                <div class="row row--30">
                   <ul>
                    @foreach ($user_order as $item)
                    <li><a href="{{URL::to('show_order_user/'.$item->order_id)}}">Mã đơn hàng : {{$item->order_id}} || Tổng hóa đơn: {{$item->order_total}} || Ngày mua {{$item->created_at}}</a></li>
                    @endforeach
                   </ul>
                </div>
            </div>
          
        </div>
    </div>
    <!-- Start Contact Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <h5>Lịch sử mua hàng</h5>
                <div class="row row--30">
                   <ul>
                    @foreach ($history_sale as $item)
                    <li><a href="{{URL::to('show_order_user/'.$item->order_id)}}">Mã đơn hàng : {{$item->order_id}} || Tổng hóa đơn: {{$item->order_total}} || Ngày mua {{$item->created_at}}</a></li>
                    @endforeach
                   </ul>
                </div>
            </div>
          
        </div>
    </div>
    <!-- End Contact Area  -->
</main>
@endsection