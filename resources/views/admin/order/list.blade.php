@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<div class="content">
    <h2 class="page-title">Đơn hàng - <span class="fw-semi-bold">Sản phẩm</span>
    </h2>
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-danger" onclick='window.location.href="{{ url('admin/order/filter') }}"'>Filter</button>
                </div>
                <div class="box-body list-order">
                    <table id="orders-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thời gian</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Email</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $orders)
                                <tr>
                                    <td>{{ $orders->id }}</td>
                                    <td>{{ $orders->created_at }}</td>
                                    <td>{{ $orders->name }}</td>
                                    <td>
                                        @foreach($orders->orders as $value)
                                        {{ $value->product_name }} -
                                        @php
                                        $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                        @endphp
                                        Size: {{ $size }}-({{ $value->quantity }})<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $orders->email }}</td>
                                    <td>{{ number_format($orders->total_price) }}</td>
                                    <td>@if($orders->order_status == 1)
                                        <span class="label label-success" style="margin-left: 10px">Mới</span>
                                        @elseif($orders->order_status == 2)
                                        <span class="label label-primary" style="margin-left: 10px">Đang xử lý</span>
                                        @elseif($orders->order_status == 3)
                                        <span class="label label-warning" style="margin-left: 10px">Đang chuyển</span>
                                        @elseif($orders->order_status == 4)
                                        <span class="label label-info" style="margin-left: 10px">Đã chuyển</span>
                                        @elseif($orders->order_status == 5)
                                        <span class="label label-danger" style="margin-left: 10px">Đã hủy</span>
                                    @endif</td>
                                    <td><a href="{{ url('admin/order/view-orderdetail/'.$orders->id) }}">Chi tiết</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script>
    jQuery(document).ready(function($) {
        $("#orders-table").DataTable();
    });
</script>
</script>
@endsection