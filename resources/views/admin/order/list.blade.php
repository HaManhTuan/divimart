@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/buttons.dataTables.min.css')}}">
<div class="content">
    <h2 class="page-title">Đơn hàng - <span class="fw-semi-bold">Sản phẩm</span>
    </h2>
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header" style="text-align: center">
{{--                     <div class="row input-daterange">
                        <div class="col-md-4">
                            <div class="form-inline">
                                <label for="dateto" style="margin-right: 5px;">Từ</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="datefrom" id="from_date" class="form-control pull-right" placeholder="" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="text-align: left;">
                            <div class="form-inline">
                                <label for="dateto" style="margin-right: 5px;">đến</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="datefrom" id="to_date" class="form-control pull-right" placeholder="" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="text-align: left;">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Tìm kiếm</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                        </div>
                    </div> --}}
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
<script src="{{  asset('public/admin/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('public/admin/js/buttons.flash.min.js')}}"></script>
<script src="{{  asset('public/admin/js/jszip.min.js')}}"></script>
<script src="{{  asset('public/admin/js/pdfmake.min.js')}}"></script>
<script src="{{  asset('public/admin/js/vfs_fonts.js')}}"></script>
<script src="{{  asset('public/admin/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('public/admin/js/buttons.colVis.min.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script>
    // load_data();

    //  function load_data(from_date = '', to_date = '')
    //  {
    //   $('#order_table').DataTable({
    //    processing: true,
    //    serverSide: true,
    //    ajax: {
    //     url:'{{ route("view-order.index") }}',
    //     data:{from_date:from_date, to_date:to_date}
    //    },
    //    columns: [
    //     {
    //      data:'id',
    //      name:'stt'
    //     },
    //     {
    //      data:'created_at',
    //      name:'Thời gian'
    //     },
    //     {
    //      data:'',
    //      name:'Khách hàng'
    //     },
    //     {
    //      data:'order_value',
    //      name:'order_value'
    //     },
    //     {
    //      data:'order_date',
    //      name:'order_date'
    //     }
    //    ]
    //   });
    //  }

    jQuery(document).ready(function($) {
         $('.input-daterange').datepicker({
          todayBtn:'linked',
          format: "yyyy-mm-dd",
          autoclose: true
         });
        $("#orders-table").DataTable(
        {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i> <span style="margin-left:5px;">Xuất Excel</span>',
                    titleAttr: 'Excel',
                     title: 'Hóa đơn'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" ></i> <span style="margin-left:5px;">Xuất PDF</span>',
                    titleAttr: 'PDF',
                     title: 'Hóa đơn'
                }
            ],

        } 
    );
    });
</script>
</script>
@endsection