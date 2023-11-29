@extends('dashboard')
@section('content')
    <div class="col-md-12 container_total pb-4">
        <div class="dt_ngay">
            <h4>{{ number_format($tongDoanhThu, 0, ',', '.') }} <br> VND</h4>
            <h5>Doanh thu ngày hôm nay</h5>
        </div>
        <div class="dt_ngay dt_thang">
            <h4>{{ number_format($month_current, 0, ',', '.') }} <br> VND</h4>
            <h5>Doanh thu tháng</h5>
        </div>
        <div class="dt_ngay">
            <h4>{{ number_format($year_current, 0, ',', '.') }} <br> VND</h4>
            <h5>Doanh thu năm</h5>
        </div>
      
    </div>
    <hr>
    <div class="QA_table mb_30 table-responsive mt-3">
        <h5>Top sản phẩm bán chạy trong tháng</h5>
        <table class="table lms_table_active table-hover">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng đã bán</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topProducts as $key=>$item)
                <tr>
                    <td>{{$key++}}</td>
                    <td>{{$item->product_id}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->total_quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="QA_table mb_30 table-responsive mt-3">
        <h5>Top sản phẩm bán chậm tháng</h5>
        <table class="table lms_table_active table-hover">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng đã bán</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bottomProducts as $key=>$item)
                <tr>
                    <td>{{$key++}}</td>
                    <td>{{$item->product_id}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->total_quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
