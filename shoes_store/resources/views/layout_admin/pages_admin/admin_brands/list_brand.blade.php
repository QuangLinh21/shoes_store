@extends('dashboard')
@section('content')
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30 pt-4">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="white_box_tittle list_header">
                    <h4>Thương Hiệu </h4>
                    <div class="box_right d-flex lms_block">
                        <div class="serach_field_2">
                            <div class="search_inner">
                                <form>
                                    <div class="search_field">
                                        <input type="text" name="search" value="{{old('search')}}" placeholder="Search content here...">
                                    </div>
                                    {{-- <button type="submit" > <i class="ti-search"></i> </button> --}}
                                    <div class="add_button ms-2">
                                        <a href="#" data-toggle="modal" data-target="#addcategory"
                                            class="btn_1">search</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
                @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-dannger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                <div class="QA_table mb_30 table-responsive">
                    <table class="table lms_table_active table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col" colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_brand as $key=>$item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{$item->brand_id}}</td>
                                <td>{{$item->brand_name}}</td>
                                <td>{{$item->brand_des}}</td>
                                <td>{{$item->brand_position}}</td>
                                <td><img src="{{asset($item->brand_img)}}" style="width: 90px"></td>
                                <td>
                                    <?php
                                    if ($item->brand_status == 0) {
                                    ?>
                                    <a href="{{ URL::to('active-brand/' . $item->brand_id) }}"
                                        class="btn status_btn_st text-white">Ẩn</a>
                                    <?php
                                    } else {
                                    ?>
                                    <a href="{{ URL::to('unactive-brand/' . $item->brand_id) }}"
                                        class="btn  status_btn text-white">Hiển Thị</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{route('brand.edit',$item->brand_id)}}" class="action_btn mr_10"> <i
                                                class="far fa-edit"></i> </a>
                                        <a href="{{URL::to('delete_brand/'.$item->brand_id)}}" class="action_btn"  onclick="return confirm('Bạn có muốn xóa danh mục này không?')"> <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="data_Tables_paginate paging_simple_numbers mt-5">
                        {{ $list_brand->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
