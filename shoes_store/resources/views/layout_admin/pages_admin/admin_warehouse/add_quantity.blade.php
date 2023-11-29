@extends('dashboard')
@section('content')
    <div class="col-md-12">
        <h3>Thêm mới thương hiệu</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-dannger">
                {{ session()->get('error') }}
            </div>
        @endif
        <form method="post" role="form" action="{{URL::to('plus_kho_product/'.$product->kho_id)}}" >
            @csrf
            <div>
                <div class="mb-3">
                    <label for="id_cate" class="form-label">Sản phẩm</label>
                    <input type="text" class="form-control" required name="product_id" value="{{$product->product_id}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="id_cate" class="form-label">Sản phẩm</label>
                    <input type="text" class="form-control" required name="product_name" value="{{$product->product_name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="id_cate" class="form-label">Số lượng</label>
                   <input type="number" class="form-control" required name="quantity">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
@endsection
