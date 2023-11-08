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
        <form method="post" role="form" action="{{route('news.update',$new->new_id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Tên tin tức</label>
                    <input type="name" class="form-control" required name="new_title" value="{{$new->new_title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" required  name="new_des" rows="3">{{$new->new_des}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                    <textarea class="form-control" required  id="ckeditor_cate" name="new_content" rows="3">{{$new->new_content}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control"   name="new_img" id="namecategory1">
                    <img src="{{asset($new->new_img)}}" alt="" class="mt-3" style="width:auto; height:100px">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
