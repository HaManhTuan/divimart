@extends('layouts.home.home_layout')
@section('content')
  <div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
    <div class="container">
      <h4>Lịch sử mua hàng</h4>
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a>Lịch sử mua hàng</a>
      </div>
    </div>
  </div>
  <section class="register-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5 mb-5">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title text-center">
                Lịch sử mua hàng
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered orderview">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Hình thức thanh toán</th>
                    <th>Tổng tiền</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                      @foreach($order->orders as $pro)
                      {{ $pro->product_name }}-
                      @php
                      $size = DB::table('product_size')->where('id',$pro->size)->value('size');
                      @endphp
                      Size: {{ $size }}
                      @endforeach
                    </td>
                    <td>COD - @if ($order->order_status == 4)
                        <span class="badge badge-success">Đã giao hàng</span>
                    @else
                        <span class="badge badge-danger">Đang chờ</span>
                    @endif</td>
                    <td>{{ number_format($order->total_price) }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><button type="button" class="btn btn-warning btn-orderdetail" data-id="{{ $order->id }}" data-toggle="modal" data-target="#OrderDetail"><i class="ti-view-list"  ></i> Chi tiết</button></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<div id="OrderDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg bounceInRight animated" style="max-width: 1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chi tiết đơn hàng
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Thoát</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(".btn-orderdetail").click(function() {
    let id = $(this).attr('data-id');
    $.ajax({
      url: '{{url("account/history-orderdetail")}}',
      type: 'POST',
      data: {id: id},
      dataType: 'JSON',
      headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
      },
      success:function(data) {
        //console.log(data);
         $("#OrderDetail .modal-body").html(data.body);
         $("#OrderDetail").modal('show');
      },
      error: function(err) {
        console.log(err);
      }
    });
    return false;
  });
</script>
@endsection