@extends('dashboard')
@section('content')
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30 pt-4">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="white_box_tittle list_header">
                    <h4>Danh sach sản Phẩm</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="serach_field_2">
                            <div class="search_inner">
                                <form>
                                    <div class="search_field">
                                        <input type="text" name="search" value="{{old('search')}}" placeholder="Search content here...">
                                    </div>
                                    <button type="submit" > <i class="ti-search"></i> </button>
                                    {{-- <div class="add_button ms-2">
                                        <a href="#" data-toggle="modal" data-target="#addcategory"
                                            class="btn_1">search</a>
                                    </div> --}}
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
                    <h5>Doanh thu theo ngày</h5>
                    <table class="table lms_table_active table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Doanh thu</th>
                                {{-- <th scope="col" colspan="2">Thao tác</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result_day as $key=>$item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{$item->ngay  }}</td>
                                <td>{{ number_format($item->tong_doanh_thu, 0, ',', '.') }} VNĐ</td>
                              
                                {{-- <td>{{$item->mota}}</td> --}}
                                {{-- <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{route('category.edit',$item->id)}}" class="action_btn mr_10"> <i
                                                class="far fa-edit"></i> </a>
                                        <a href="{{URL::to('delete_cate/'.$item->id)}}" class="action_btn"  onclick="return confirm('Bạn có muốn xóa danh mục này không?')"> <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="data_Tables_paginate paging_simple_numbers mt-5">
                        {{ $list_cate->links('pagination::bootstrap-4') }}
                    </div> --}}
                </div>
                <div class="QA_table mb_30 table-responsive">
                    <h5>Doanh thu theo tháng</h5>
                    <table class="table lms_table_active table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Năm</th>
                                <th scope="col">Tháng</th>
                                <th scope="col">Doanh thu</th>
                                {{-- <th scope="col" colspan="2">Thao tác</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result_month as $key=>$item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{$item->nam  }}</td>
                                <td>{{$item->thang  }}</td>
                                <td>{{ number_format($item->doanhthu_thang, 0, ',', '.') }} VNĐ</td>
                              
                                {{-- <td>{{$item->mota}}</td> --}}
                                {{-- <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{route('category.edit',$item->id)}}" class="action_btn mr_10"> <i
                                                class="far fa-edit"></i> </a>
                                        <a href="{{URL::to('delete_cate/'.$item->id)}}" class="action_btn"  onclick="return confirm('Bạn có muốn xóa danh mục này không?')"> <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="data_Tables_paginate paging_simple_numbers mt-5">
                        {{ $list_cate->links('pagination::bootstrap-4') }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
