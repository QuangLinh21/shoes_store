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
        <form method="post" role="form" action="{{route('brand.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Tên thương hiệu</label>
                    <input type="name" class="form-control" required name="brand_name" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" required  id="ckeditor_cate" name="brand_des" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Vị trí</label>
                    <input type="number" class="form-control" required name="brand_position" >
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" value="{{ old('brand_img') }}"  name="brand_img" id="namecategory1">
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Trạng thái</label>
                    <select name="brand_status" required class="form-select">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
@endsection
