@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Danh sách <span class="fw-semi-bold">khách hàng</span>
                    </h4>
                </div>

                <div class="box-body">
                  <table id="table-customer" class="table table-bordered table-hover coupon">
                   <thead>
                     <tr>
                       <th>ID</th>
                       <th>Tên</th>
                       <th>SĐT</th>
                       <th>Email</th>
                       <th>Đơn hàng</th>
                       <th>Số tiền</th>
                     </tr>
                   </thead>
                   <tbody>
                    @php
                    $stt = 1;
                    @endphp
                    @foreach($customer as $customer)
                    <tr id="tr-item-{{ $customer->id }}" class="tr-item">
                      <td>{{  $stt++ }}</td>
                      <td>{{ $customer->name }}</td>
                      <td>
                        {{ $customer->phone }}
                      </td>
                      <td>
                        {{ $customer->email}}
                      </td>
                      <td>
                        @php
                            $count = DB::table('orders')->where('customer_id',$customer->id)->get();
                        @endphp
                        {{ count($count) }} đơn hàng
                      </td>
                      <td>
                        @php
                            $total = DB::table('orders')->where('customer_id',$customer->id)->sum('coupon_price');
                            echo number_format($total);
                        @endphp
                      </td>
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
<script >
  $(document).ready( function () {
  $('#table-customer').DataTable();
} );
</script>
@endsection