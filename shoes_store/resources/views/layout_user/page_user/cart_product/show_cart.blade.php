@extends('welcome')
@section('content')
    <main class="main-wrapper">

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Giỏ hàng </h4>
                    </div>
                    <?php
                    // $content = Cart::content();
                    //  echo '<pre>';
                    //     print_r($content);
                    // echo '</pre>'
                    
                    //
                    ?>
                    <div class="table-responsive">
                        <?php
                        $content = Cart::content();
                        // dd($content);
                        ?>
                        <table class="table axil-product-table axil-cart-table mb--40">

                            <thead>
                                <tr>

                                    <th scope="col" class="product-thumbnail">Ảnh</th>
                                    <th scope="col" class="product-title">Tên sản phẩm</th>
                                    <th scope="col" class="product-price">Giá</th>
                                    <th scope="col" class="product-quantity">Số lượng</th>
                                    <th scope="col" class="product-size">size</th>
                                    <th scope="col" class="product-subtotal">Subtotal</th>
                                    <th scope="col" class="product-remove">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $item)
                                    <tr>

                                        <td class="product-thumbnail"><img src="{{ asset($item->options->images) }}"
                                                alt="Digital Product"></td>
                                        <td class="product-title"><a href="#">{{ $item->name }}</a></td>
                                        <td class="product-price" data-title="Price">
                                            {{ number_format($item->price, 0, ',', '.') }}<span
                                                class="currency-symbol">VNĐ</span></td>
                                        <td class="product-quantity" data-title="Số lượng">
                                            <div class="" data-title="Số lượng">
                                                <form id="updateCartForm" action="{{ URL::to('update_cart_qty') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="number" name="cart_qty" class="quantity-input"
                                                        value="{{ $item->qty }}">
                                                    <input type="hidden" value="{{ $item->rowId }}" name="rowId_cart">
                                                </form>
                                        </td>
                    </div>
                    </td>
                    <td class="product-quantity" data-title="Size">
                        <div class="">
                            <form id="updateSize" action="{{ url::to('update_size') }}" method="post">
                                @csrf
                                <input type="number" class="cart_size" name="cart_size" value="{{ $item->options->size }}">
                                <input type="hidden" value="{{ $item->rowId }}" name="rowId_cart">
                            </form>
                        </div>
                    </td>

                    <td class="product-subtotal" data-title="Subtotal">
                        <?php
                        $subtotal = $item->price * $item->qty;
                        echo number_format($subtotal, 0, ',', '.');
                        ?>
                        <span class="currency-symbol">VNĐ</span>
                    </td>
                    <td class="product-remove"><a href="{{ URL::to('delete_cart_item/' . $item->rowId) }}"
                            class="remove-wishlist" onclick="return confirm('Bạn có muốn xóa danh mục này không?')"><i
                                class="fal fa-times"></i></a></td>


                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <h5 class="title mb--20">Tổng hóa đơn</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table mb--30">
                                    <tbody>
                                        <tr class="order-subtotal">
                                            <td>Tổng</td>
                                            <td>{{ Cart::priceTotal(0, ',', '.') . '' . 'VND' }}</td>
                                        </tr>
                                        <tr class="order-shipping">
                                            <td>Phí vận chuyển</td>
                                            <td>
                                                <label for="radio1">Free Shippping</label>
                                            </td>
                                        </tr>
                                        <tr class="order-tax">
                                            <td>Thuế</td>
                                            <td>{{ Cart::tax(0, ',', '.') . '' . 'VND' }}</td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Thành tiền</td>
                                            <td class="order-total-amount">{{ Cart::total(0, ',', '.') . '' . 'VND' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            $customer_id = Session::get('cus_id');
                            if($customer_id==null){
                                ?>
                            <a href="{{ URL::to('login_acc') }}" class="axil-btn btn-bg-primary checkout-btn">Login</a>
                            <?php
                        } else {?>
                            <a href="{{URL::to('payment') }}" class="axil-btn btn-bg-primary checkout-btn">Thanh
                                toán</a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quantityInput = document.querySelector('.quantity-input');
            var updateCartForm = document.getElementById('updateCartForm');

            // Bắt sự kiện thay đổi giá trị trong input
            quantityInput.addEventListener('change', function() {
                // Tự động submit form khi giá trị thay đổi
                updateCartForm.submit();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var updateSizeForm = document.getElementById('updateSize');
            var cartSizeInput = updateSizeForm.querySelector('.cart_size');

            // Bắt sự kiện thay đổi giá trị trong input
            cartSizeInput.addEventListener('change', function() {
                // Tự động submit form khi giá trị thay đổi
                updateSizeForm.submit();
            });
        });
    </script>
@endsection
