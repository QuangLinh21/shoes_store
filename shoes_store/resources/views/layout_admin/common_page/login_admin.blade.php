<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/bootstrap/login-form-04/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Nov 2023 15:16:25 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('login/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
    <title>Shoes Store</title>
</head>
<style>
#img_body{
    background-image: url({{ asset('login/images/bg_1.jpg') }});
}
</style>
<body>
    <div class="d-md-flex half">
        <div class="bg" id="img_body" ></div>
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                            <strong><h3>Đăng nhập</strong></h3>

                            </div>
                            @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{URL::to('admin_login')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="email" class="form-control" name="username" placeholder="quanglinh@gmail.com" id="username">
                                    @error('username')
                                    <span style="color:red; margin-top:5px;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="YourPassword" id="password">
                                    @error('password')
                                    <span style="color:red; margin-top:5px;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot
                                            Password</a></span>
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Mirrored from preview.colorlib.com/theme/bootstrap/login-form-04/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Nov 2023 15:16:29 GMT -->

</html>
