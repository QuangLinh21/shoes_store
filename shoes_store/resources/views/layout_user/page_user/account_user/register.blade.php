@extends('welcome')
@section('content')
<div >
    <div class="row">
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title mb-5">Đăng ký tài khoản</h3>
                    <form class="singin-form" action="{{route('customer.store')}}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" name="cus_name" required placeholder="anniemario">
                        </div>
                        <div class="form-group">
                            <label>Tài khoản</label>
                            <input type="email" class="form-control" name="cus_username" required placeholder="annie@example.com">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="cus_password" required placeholder="123456789">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">We Offer the Best Products</h3>
            </div>
        </div>
       
    </div>
</div>
@endsection