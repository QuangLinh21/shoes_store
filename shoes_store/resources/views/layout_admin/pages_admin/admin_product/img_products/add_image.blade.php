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
        <form method="post" role="form" action="{{route('img_product.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" name="product_id" value="{{$id_product}}">
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" required name="img_product" id="namecategory1">
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Vị trí</label>
                    <input type="number" class="form-control" required name="img_position" >
                </div>
                <div class="mb-3">
                    <label for="namecategory" class="form-label">Trạng thái</label>
                    <select name="img_status" required class="form-select">
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
