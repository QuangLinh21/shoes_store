<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index-2.html"><img src="img/logo.png" alt></a>
        <a class="small_logo" href="index-2.html"><img src="img/mini_logo.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/dashboard.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Thương hiệu</span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('brand.create')}}">Thêm mới</a></li>
                <li><a href="{{URL::to('brand')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/2.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Danh mục </span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('category.create')}}">Thêm mới</a></li>
                <li><a href="{{URL::to('category')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/3.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Sản phẩm</span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('product.create')}}">Thêm mới</a></li>
                <li><a href="{{URL::To('product')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/20.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Tin tức</span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('news.create')}}">Thêm mới</a></li>
                <li><a href="{{URL::to('news')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/20.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Hóa đơn</span>
                </div>
            </a>
            <ul>
                <li><a href="{{url::to('admin_order')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/20.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Hình thức thanh toán</span>
                </div>
            </a>
            <ul>
                <li><a href="{{url::to('payment_create')}}">Thêm mới</a></li>
                <li><a href="{{url::to('admin_payment')}}">Danh sách</a></li>
            </ul>
        </li>
       
    </ul>
</nav>
