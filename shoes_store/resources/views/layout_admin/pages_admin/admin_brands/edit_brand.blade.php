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
        <form method="post" role="form" action="{{route('brand.update',$edit->brand_id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Tên thương hiệu</label>
                    <input type="name" class="form-control" required name="brand_name" value="{{$edit->brand_name}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" required  id="ckeditor_cate" name="brand_des" rows="3">{{$edit->brand_des}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Vị trí</label>
                    <input type="number" class="form-control" required name="brand_position" value="{{$edit->brand_position}}">
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control"  name="brand_img" id="namecategory1">
                    <img src="{{asset($edit->brand_img)}}" alt="" class="mt-3" style="width:auto; height:100px">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
