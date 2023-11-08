@extends('dashboard')
@section('content')
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30 pt-4">
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Ảnh sản phẩm</h4>
                        <a href="{{route('img_product.edit',$id_product)}}">Thêm mới ảnh sản phẩm</a>
                    </div>
                   <div class="d-flex flex-wrap justify-content-between">
                    @foreach ($img_product as $item)
                    <div class="box_right d-flex lms_block list_img_pro shadow p-3 mb-5 bg-body rounded">
                        <img src="{{ asset($item->img_product) }}" alt="">
                        <div class="img_product_option pt-3">
                            <div class="option_img_status">
                                <?php
                                    if ($item->img_status == 0) {
                                    ?>
                                <a href="{{URL::to('active_product_img/'. $item->img_pro_id) }}"
                                    class="btn status_btn_st text-white">Ẩn</a>
                                <?php
                                    } else {
                                    ?>
                                <a href="{{URL::to('unactive_product_img/'. $item->img_pro_id) }}"
                                    class="btn  status_btn text-white">Hiển Thị</a>
                                <?php
                                    }
                                    ?>
                            </div>
                            <div class="option_img_del">
                                <a href="{{URL::to('delete_img_pro/'.$item->img_pro_id)}}" onclick="return confirm('Bạn có muốn xóa danh mục này không?')">Xóa</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
