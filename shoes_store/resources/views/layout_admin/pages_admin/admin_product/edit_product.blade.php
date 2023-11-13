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
        <form method="post" role="form" action="{{route('product.update',$product->product_id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="mb-3">
                    <label for="id_cate" class="form-label">Danh mục</label>
                    <select name="cate_id"  class="form-select">
                        @foreach ($category as $item)
                            <option value="{{$item->cate_id}}" <?php if($item->cate_id==$product->cate_id) echo("selected") ?>>{{$item->cate_name}}</option>
                        @endforeach
                    </select>
                </div><div class="mb-3">
                    <label for="brand_cate" class="form-label">Thương hiệu</label>
                    <select name="brand_id"  class="form-select">
                        @foreach ($brand as $item)
                            <option value="{{$item->brand_id}}" <?php if($item->brand_id==$product->brand_id) echo("selected") ?>>{{$item->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" required value="{{$product->product_name}}" name="product_name" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" required   name="product_des" rows="3" id="ckeditor_product">{{$product->product_des}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Giá</label>
                    <input type="number" class="form-control" required name="product_price" value="{{$product->product_price}}" >
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control"  name="img_main" id="namecategory1">
                    <img src="{{asset($product->img_main)}}" alt="" class="mt-3" style="width:auto; height:100px">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
