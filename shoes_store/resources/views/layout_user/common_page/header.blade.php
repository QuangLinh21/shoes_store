<header class="header axil-header header-style-5">
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-dropdown">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                English
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Arabic</a></li>
                                <li><a class="dropdown-item" href="#">Spanish</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                USD
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">USD</a></li>
                                <li><a class="dropdown-item" href="#">AUD</a></li>
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li><a href="#">Help</a></li>
                            <li><a href="sign-up.html">Join Us</a></li>
                            <li><a href="sign-in.html">Sign In</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="index.html" class="logo logo-dark">
                        <img src="assets/images/logo/logo.png" alt="Site Logo">
                    </a>
                    <a href="index.html" class="logo logo-light">
                        <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li>
                                <a href="{{ URL::to('/') }}">Trang chủ</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Thương hiệu</a>
                                <ul class="axil-submenu">
                                    @foreach ($list_brand as $item)
                                        <li><a
                                                href="{{ route('brand.show', $item->brand_id) }}">{{ $item->brand_name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Danh mục</a>
                                <ul class="axil-submenu">
                                    @foreach ($list_cate as $item)
                                        <li><a
                                                href="{{ route('category.show', $item->cate_id) }}">{{ $item->cate_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url::to('show_new') }}">Tin tức</a>
                            </li>
                            <li><a href="{{ URL::to('contact') }}">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="form_search">
                            <form action="{{ url::to('search') }}" method="post" class="d-flex">
                                {{ csrf_field() }}
                                <input type="text" class="placeholder product-search-input" name="keyword" placeholder="What are you looking for?" >
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </button>
                            </form>  
                        </li>
                        <li class="wishlist">
                            <?php
                            $customer_id = Session::get('cus_id');
                            if($customer_id==null){
                                ?>
                            <a href="{{ URL::to('login_acc') }}">
                                <i class="fa-solid fa-credit-card" style="font-size: 20px;"></i>
                            </a>
                            <?php
                            } else {?>
                            <a href="{{ URL::to('payment') }}">
                                <i class="fa-solid fa-credit-card" style="font-size: 20px;"></i>
                            </a>
                            <?php
                            }
                            ?>

                        </li>
                        <li class="shopping-cart">
                            <a href="{{ URL::to('show_cart') }}">
                                {{-- <span class="cart-count">3</span> --}}
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <span class="title">KHÁCH HÀNG</span>
                                <ul>

                                    <li>
                                        <a href="#">
                                            @php
                                                $cus_name = Session::get('cus_name');

                                                if ($cus_name) {
                                                    echo $cus_name;
                                                }
                                            @endphp</a>
                                    </li>
                                </ul>
                                <div class="login-btn">

                                    <?php
                                    $cus_id = Session::get('cus_id');
                                    // dd( $cus_id );
                                    if($cus_id == ''){
                                       ?>
                                    <a href="{{ URL::to('login_acc') }}" class="axil-btn btn-bg-primary">Login</a>
                                    <?php
                                    }
                                    else{  ?>
                                    <a href="{{ URL::to('checkout_user') }}"
                                        class="axil-btn btn-bg-primary">Logout</a>
                                    <?php
                                    }
                                   ?>
                                </div>
                                <div class="reg-footer text-center">No account yet? <a
                                        href="{{ URL::to('customer') }}" class="btn-link">REGISTER HERE.</a></div>
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
