@extends('welcome')
@section('content')
    <style>
        .container_set {
            display: block;
        }
    </style>
    <?php
    $customer_id = Session::get('cus_id');
    $content = Cart::content();
    ?>
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
    <main class="main-wrapper">
        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-pencil"></i> Mã giảm giá<a
                                        href="javascript:void(0)" class="toggle-btn">Click here to enter your code <i
                                            class="fas fa-angle-down"></i></a>
                                </div>

                                <div class="axil-checkout-coupon toggle-open">
                                    <p>Nhập mã giảm giá nếu bạn có !</p>
                                    <div class="input-group">
                                        <input placeholder="Enter coupon code" type="text">
                                        <div class="apply-btn">
                                            <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Thông tin nhận hàng</h4>
                            <form action="{{ route('payments.store') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="cus_id" value="{{ $customer_id }}">
                                <div class="form-group">
                                    <label>Họ và tên<span>*</span></label>
                                    <input type="text" id="last-name" required name="cus_name" placeholder="Họ vad tên">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại<span>*</span></label>
                                    <input type="text" name="cus_phone" required placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <textarea rows="2" name="cus_address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea rows="2" name="cus_note"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Thêm thông tin
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 container_set" id="container_null">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>

                            <?php
                              $id_shipping = Session::get('shipping_id');
                            //   dd($id_shipping);
								if($id_shipping==null){
									?>
                            <script>
                                alert('Bạn cần nhập thông tin nhận hàng')
                            </script>
                            <?php
							    } else {
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Xử lý form
                                // Thêm mã xử lý form ở đây
                              } else {
                                ?>
                      <form action="{{ URL::to('payment_bill')}}" method="post" class="mb-3">
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($content as $item)
                                            <tr class="order-product">
                                                <td>{{ $item->name }}&nbsp; <span
                                                        class="quantity">x{{ $item->qty }}</span></td>

                                                <td><?php
                                                $subtotal = $item->price * $item->qty;
                                                echo number_format($subtotal, 0, ',', '.');
                                                ?><span class="currency-symbol">VNĐ</span></td>
                                            </tr>
                                        @endforeach
                                        <tr class="order-total">
                                            <td></td>
                                            <td class="order-total-amount"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row row_total">
                                    <div class="col-md-6">Phí vân chuyển</div>
                                    <div class="col-md-6 col-sp">Free</div>
                                    <div class="col-md-6">Thuế</div>
                                    <div class="col-md-6 col-sp">{{ Cart::tax(0, ',', '.') . '' . 'VND' }}</div>
                                    <div class="col-md-6" style="font-size: 23px; font-weight: bold; color: #000;">Thành
                                        tiền</div>
                                    <div class="col-md-6 col-sp" style="font-size: 23px; font-weight: bold; color: #000;">
                                        {{ Cart::total(0, ',', '.') . '' . 'VND' }}</div>
                                </div>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <h3 class="mb-3">Địa chỉ nhận hàng</h3>
                                    @foreach ($shipping as $item)
                                        <div class="">
                                            <a href="{{ URL::to('delete_address_user/' . $item->ship_id) }}"
                                                onclick="return confirm('Bạn có muốn xóa danh mục này không?')">Xóa</a>
                                            ||
                                            <input type="radio" id="address_{{ $item->ship_id }}" name="address_cus"
                                                value="{{ $item->ship_id }}" checked>
                                            <label for="address_{{ $item->ship_id }}">{{ $item->cus_name }}
                                                ||
                                                {{ $item->cus_phone }} ||{{ $item->cus_address }} </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="single-payment d-none">
                                    <h3 class="mb-3">Hình thức thanh toán</h3>
                                    <div class="">
                                        <input type="radio" id="ship_code" name="ship" value="1" checked>
                                        <label for="ship_code">Ship code</label>
                                    </div>
                                    {{-- <div>
                                        <input type="radio" id="pay" name="ship" value="2">
                                        <label for="pay">Thanh toán VNPAY</label>
                                    </div> --}}
                                </div>
                            </div>
                         
                                {{ csrf_field() }}
                                <input type="hidden" name="total_vnpay" value="{{ Cart::total()}}">
                                <button type="submit" name="redirect" class="axil-btn btn-bg-primary checkout-btn">Thanh toán - Shop code</button>
                                {{-- <a href="" name="redirect" class="axil-btn btn-bg-primary checkout-btn">Thanh toán vnpay</a> --}}
                            </form>
                            <form action="{{ URL::to('payment_vnpay')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="total_vnpay" value="{{ Cart::total()}}">
                                <button type="submit" name="redirect" class="axil-btn btn-bg-primary checkout-btn">Thanh toán -VNPAY</button>
                                {{-- <a href="" name="redirect" class="axil-btn btn-bg-primary checkout-btn">Thanh toán vnpay</a> --}}
                            </form>
                          
                            <?php
								}
                            }
								?>
                                 
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
@endsection
