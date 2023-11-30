@extends('welcome')
@section('content')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <h1 class="title">Đơn hàng đã mua</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">

                    </div>


                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 QA_section">
                        <div class="white_card_body">
                            <div class="QA_table table-responsive " >
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @elseif(session()->has('error'))
                                    <div class="alert alert-dannger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <table class="table axil-product-table axil-cart-table mb--40">
        
                                    <thead>
                                        <tr>
        
                                            <th scope="col" class="product-thumbnail">Ảnh</th>
                                            <th scope="col" class="product-title">Tên sản phẩm</th>
                                            <th scope="col" class="product-price">Giá</th>
                                            <th scope="col" class="product-quantity">Số lượng</th>
                                            <th scope="col" class="product-size">size</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_bill as $item)
                                            <tr>
                                                <td class="product-thumbnail"><img src="{{ asset($item->img_main) }}"
                                                        alt="Digital Product"></td>
                                                <td class="product-title"><a href="#">{{ $item->product_name }}</a></td>
                                                <td class="product-price" data-title="Price">
                                                    {{ number_format($item->product_price, 0, ',', '.') }}<span
                                                        class="currency-symbol">VNĐ</span></td>
                                                <td class="product-quantity" >
                                                    {{ $item->product_quantity }}
                                                </td>
                
                                                <td class="product-quantity" >
                                                    {{ $item->size }}
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Area  -->
    </main>
@endsection
