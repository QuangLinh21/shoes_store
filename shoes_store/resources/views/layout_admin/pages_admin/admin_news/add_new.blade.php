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
        <form method="post" role="form" action="{{route('news.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Tên tin tức</label>
                    <input type="name" class="form-control" required name="new_title" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" required  name="new_des" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                    <textarea class="form-control" required  id="ckeditor_new" name="new_content" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control"   name="new_img" id="namecategory1">
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Trạng thái</label>
                    <select name="new_status" required class="form-select">
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
