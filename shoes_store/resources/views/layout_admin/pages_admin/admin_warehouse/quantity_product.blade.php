@extends('dashboard')
@section('content')
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30 pt-4">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="white_box_tittle list_header">
                    <h4>Sản Phẩm</h4>
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
                                <th scope="col">ID sản phẩm</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Nhập kho</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quantity as $key=>$item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{$item->kho_id }}</td>
                                <td>{{$item->product_id }}</td>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>
                                    <?php
                                    if ($item->quantity >= 100) {
                                    ?>
                                    <p class="btn status_btn text-white">Còn nhiều</p>
                                   
                                    <?php
                                    } if($item->quantity < 100 && $item->quantity >= 30) {
                                    ?>
                                    <p class="btn status_btn_st text-white">Còn ít</p>
                                    <?php
                                    }if($item->quantity<30) {
                                        ?>
                                        <p class="btn status_btn_it text-white">Còn rất ít</p>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{URL::to('plus_product',$item->kho_id)}}" class="action_btn mr_10"> <i
                                                class="far fa-edit"></i> </a>
                                       
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="data_Tables_paginate paging_simple_numbers mt-5">
                        {{ $quantity->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
