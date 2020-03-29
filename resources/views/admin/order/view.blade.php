

@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/toastr.min.css')}}">
<div class="content">
   <style>
      .mt-1{
      margin-top: 10px;
      }
   </style>
   <h2 class="page-title">Chi tiết - <span class="fw-semi-bold">đơn hàng</span>
   </h2>
   <div class="row">
      <div class="col-md-12">
         <section class="box">
            <div class="box-header">
               <h4 class="pull-left">
                  Chi tiết <span class="fw-semi-bold">đơn đặt hàng</span>
               </h4>
               <button type="button" class="btn btn-danger pull-right" id="invice" onclick='window.location.href="{{ url('admin/order/invoice/'.$orderDetail->id) }}"'>Hóa đơn</button>
            </div>
            <div class="box-body">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="box box-success box-solid">
                        <div class="box-header with-border">
                           <h5 class="box-title">Trạng thái đơn hàng</h5>
                           @if($orderDetail->order_status == 1)
                           <span class="label label-success" style="margin-left: 10px">Mới</span>
                           @elseif($orderDetail->order_status == 2)
                           <span class="label label-primary" style="margin-left: 10px">Đang xử lý</span>
                           @elseif($orderDetail->order_status == 3)
                           <span class="label label-warning" style="margin-left: 10px">Đang chuyển</span>
                           @elseif($orderDetail->order_status == 4)
                           <span class="label label-info" style="margin-left: 10px">Đã chuyển</span>
                           @elseif($orderDetail->order_status == 5)
                           <span class="label label-danger" style="margin-left: 10px">Đã hủy</span>
                           @endif
                           <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                           </div>
                           <!-- /.box-tools -->
                        </div>
                        <div class="box-body">
                           <table class="table table-bordered ">
                              <tr>
                                 <th scope="col">Ngày tạo</th>
                                 <th scope="col">{{ date('d/m/Y h:i:s',strtotime($orderDetail->created_at)) }}</th>
                              </tr>
                              <tr>
                                 <th scope="col">Tổng tiền</th>
                                 <th scope="col">{{ number_format($orderDetail->coupon_price) }}</th>
                              </tr>
                              @if (isset($customerDetail) && !empty($customerDetail))
                              @if ($orderDetail->coupon_price > 500000)
                              <tr>
                                 <th scope="col">Gửi mã giảm giá</th>
                                 <th scope="col">
                                    <small>Nếu đơn hàng lớn hơn 500,000 nghìn. Bạn có thể gửi mã giảm giá</small><br>
                                    <form class="form-inline" method="POST" action="{{ url('admin/order/send-coupon') }}" onsubmit="return false;" id="frm-coupon">
                                       @csrf
                                       <input type="hidden" name="customer_id" value="{{ $orderDetail->customer_id }}">
                                       <select name="coupon" class="form-control" id="coupon"  >
                                          <option selected="" disabled="">--Chọn--</option>
                                          @foreach ($coupon as $item)
                                          <option value="{{ $item->coupon_code }}">{{ $item->coupon_code }} -
                                             @if ($item->amount_type="Persentage")
                                             {{ $item->amount}} %
                                             @else
                                             {{ number_format($item->amount)}}
                                             @endif
                                          </option>
                                          @endforeach
                                       </select>
                                       <button type="submit" class="btn btn-success" id="send-coupon" >Gửi</button>
                                       {{--  {{  $orderDetail->order_status == 4 ? 'disabled' : '' }} --}}
                                    </form>
                                 </th>
                              </tr>
                              @endif
                              @endif
                              @if ($orderDetail->coupon_amount != 0)
                              <tr>
                                 <th scope="col">Giảm giá:</th>
                                 <th scope="col">{{ number_format($orderDetail->coupon_amount) }}</th>
                              </tr>
                              <tr>
                                 <th scope="col">Thành tiền:</th>
                                 <th scope="col" style="font-weight: bold;">{{ number_format($orderDetail->coupon_price) }}</th>
                              </tr>
                              <tr>
                                 <th scope="col">Mã giảm giá</th>
                                 <th scope="col">{{ ($orderDetail->coupon_code) }}</th>
                              </tr>
                              @endif
                              <tr>
                                 <th scope="col">Hình thức thanh toán</th>
                                 <th scope="col">
                                    COD
                                 </th>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-lg-6">
                     <div class="box box-success box-solid">
                        <div class="box-header with-border">
                           <h5 class="box-title">Khách hàng</h5>
                           <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <div class="box-body">
                           <table class="table table-bordered ">
                              <tr>
                                 <th scope="col">Họ tên:</th>
                                 <th scope="col">{{ $orderDetail->name }}</th>
                              </tr>
                              <tr>
                                 <th scope="col">Số điện thoại</th>
                                 <th scope="col">
                                    {{ $orderDetail->phone }}
                                 </th>
                              </tr>
                              <tr>
                                 <th scope="col">Email</th>
                                 <th scope="col">
                                    {{ $orderDetail->email }}
                                 </th>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <div class="box box-success box-solid">
                        <div class="box-header with-border">
                           <h5 class="box-title">Trạng thái đơn hàng</h5>
                           <input type="hidden" name="order_id" id="order_id" value="{{ $orderDetail->id }}">
                           @if (isset($customerDetail) && !empty($customerDetail))
                           <input type="hidden" name="customer_id" id="customer_id" value="{{ $customerDetail->id }}">
                           @endif
                           <select name="order_status" id="order_status" class="form-control" style="width: 180px;margin-left: 50px;display: inline-block;">
                              @if ($orderDetail->order_status == 4)
                              <option value="4" selected="">Đã chuyển</option>
                              @else
                              <option value="1">Mới</option>
                              <option value="2">Đang chờ xử lý</option>
                              <option value="3">Đang chuyển</option>
                              <option value="4" selected="">Đã chuyển</option>
                              <option value="5">Đã hủy</option>
                              @endif
                           </select>
                           <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <div class="box-body">
                           <div class="log-admin">
                              @foreach($adminHis as $adminHis)
                              <h6 style="font-weight: bold;font-size: 12px">{{ $adminHis->admin_His->name }} | {{ $adminHis->action }} | {{ $adminHis->created_at }}</h6>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <script>
                  $('select#order_status option[value="' + {{ $orderDetail->order_status }} +'"]').prop("selected", true)
                  @if (isset($customerDetail) && !empty($customerDetail))
                  $('select#coupon option[value="' + {{ $customerDetail->coupon }} +'"]').prop("selected", true);
                  @endif
               </script>
               <div class="row" style="margin-top: 25px;">
                  <div class="col-lg-6">
                     <div class="box box-success box-solid">
                        @if ( isset($customerDetail) && !empty($customerDetail))
                        <div class="box-header with-border" style="display: flex;align-items: center;">
                           <h5 class="m-0 box-title">Địa chỉ hóa đơn</h5>
                           <a href="" data-toggle="modal" data-target="#edituser" style="margin-left: 20px;">Sửa</a>
                        </div>
                        @else
                        <div class="box-header with-border" style="display: flex;align-items: center;">
                           <h5 class="m-0 box-title">Thông tin hóa đơn.</h5>
                        </div>
                        @endif
                        @if ( isset($customerDetail) && !empty($customerDetail))
                        <div class="box-body">
                           <div class="list-order" style="margin-top: 10px; margin-bottom: 30px; ">
                              <p>{{ $customerDetail->name }}</p>
                              <p>{{ $customerDetail->phone }} </p>
                              <p>{{ $customerDetail->email }} </p>
                              <p>{{ $customerDetail->address }} </p>
                           </div>
                        </div>
                        @else
                        <div class="box-body">
                            <h5 class="box-title">Khách hàng không có tài khoản.</h5>
                        </div>
                        @endif
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="box box-success box-solid">
                        <div class="box-header with-border">
                           <h5 class="m-0 box-title">Địa chỉ chuyển hàng</h5>
                           <a class="btn btn-danger" data-toggle="modal" data-target="#editorder" style="margin-left: 20px;">Sửa</a>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <div class="box-body">
                           <div class="list-order" style="margin-top: 10px; margin-bottom: 30px; ">
                              <p>Họ tên:  {{ $orderDetail->name }}</p>
                              <p>SĐT: {{ $orderDetail->phone }} </p>
                              <p>Email: {{ $orderDetail->email }} </p>
                              <p>Địa chỉ: {{ $orderDetail->address }} </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                           <h5 class="m-0 box-title">Chi tiết đơn hàng</h5>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                         <div class="box-body">
                         <table id="order-table" class="table table-bordered table-hover">
                            <thead>
                               <tr>
                                  <th>Tên sản phẩm</th>
                                  <th>Size</th>
                                  <th>Giá</th>
                                  <th>Số lượng</th>
                                  <th>Tổng tiền</th>
                               </tr>
                            </thead>
                            <tbody>
                               @php $total_amount = 0; @endphp
                               @foreach($orderDetail->orders as $value)
                               <tr>
                                  <td>{{ $value->product_name }}</td>
                                  @php
                                  $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                  @endphp
                                  <td>{{ $size }}</td>
                                  <td>{{ number_format($value->price) }}</td>
                                  <td>{{ $value->quantity }}</td>
                                  <td>{{ number_format($value->price*$value->quantity) }}</td>
                               </tr>
                               <?php $total_amount = $total_amount+($value->quantity*$value->price);?>
                               @endforeach
                            </tbody>
                         </table>
                        </div>
                  </div>
               </div>
           </div>
               <div class="row" style="">
                  <div class="col-md-4">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="m-0">Chú ý</h5>
                        </div>
                        <div class="card-body">
                           <div class="form-group">
                              <textarea name="note" id="note" rows="4" class="form-control" readonly="">{{ $orderDetail->note }}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="m-0">Comment</h5>
                        </div>
                        <div class="card-body">
                           <form action="{{ url('admin/order/log') }}" method="POST" onsubmit="return false;" id="frmcomment">
                              @csrf
                              <input type="hidden" name="admin_id" value="{{ $userLogin->id }}">
                              <input type="hidden" name="order_id" value="{{ $orderDetail->id }}">
                              <input type="hidden" name="module" value="edit-order">
                              <div class="form-group">
                                 <textarea class="form-control" name="comment" id="comment" rows="3"
                                    data-rule-required="true" data-msg-required="Mục này không được để trống."></textarea>
                              </div>
                              <div class="log-admin">
                                 @foreach($adminLog as $adminLog)
                                 <h6 style="color:darkgreen;font-weight: bold;font-size: 12px;">Nội dung: {{ $adminLog->content }} | <span style="font-weight: bold">{{ $adminLog->admin_Log->name }}</span>  | {{ $adminLog->created_at }}</h6>
                                 @endforeach
                              </div>
                              <button type="submit" class="btn btn-success" id="btn-save-comment">Comment</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="card">
                        <div class="card-body">
                           <table class="table table-bordered">
                              <thead>
                                 @if(isset($orderDetail->coupon_amount))
                                 <tr>
                                    <th>Tổng tiền</th>
                                    <th>{{ number_format($total_amount) }}</th>
                                 </tr>
                                 <tr>
                                    <th>Giảm giá:</th>
                                    <th>{{ number_format($orderDetail->coupon_amount) }}</th>
                                 </tr>
                                 <tr>
                                    <th>Thành tiền</th>
                                    <th style="color:brown;font-weight: bold;">{{ number_format($orderDetail->total_price - $orderDetail->coupon_amount) }}</th>
                                 </tr>
                                 @else
                                 <tr>
                                    <th>Tổng tiền</th>
                                    <th style="color:brown;font-weight: bold;">{{ number_format($total_amount) }}</th>
                                 </tr>
                                 @endif
                              </thead>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
   </div>
</div>
</div>
@if (isset($customerDetail) && !empty($customerDetail))
<div id="edituser" class="modal fade" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog bounceInDown animated">
      <div class="modal-content">
         <form action="{{ url('admin/order/change-customer') }}" method="post" id="id-edit-cus" class="add-size" role="form" onsubmit="return false;" enctype='multipart/form-data'>
            @csrf
            <div class="modal-header">
               <h4 class="modal-title">Bill address  &quot;
                  <span data-ajax="edit" data-field="html">{{ $orderDetail->id }}</span>&quot;
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <input type="hidden" class="form-control" name="id_cus" id="id_cus" value="{{ $customerDetail->id }}">
            <div class="modal-body">
               <div class="form-group">
                  <label for="category_name_input" class="control-label">Họ tên:<font color="#a94442">(*)</font></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $customerDetail->name }}"
                     data-rule-required="true" data-msg-required="Vui lòng nhập tên.">
               </div>
               <div class="form-group">
                  <label for="category_name_input" class="control-label">Số điện thoại:<font color="#a94442">(*)</font></label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ $customerDetail->phone }}"
                     data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại.">
               </div>
               <div class="form-group">
                  <label for="category_name_input" class="control-label">Địa chỉ:<font color="#a94442">(*)</font></label>
                  <textarea name="address" class="form-control" id="address" cols="30" rows="4" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ.">{{ $customerDetail->address }}</textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
               <button type="submit" class="btn btn-info waves-effect waves-light" id="btn-save-cus"><small class="ti-pencil-alt mr-2"></small>Sửa</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endif
<div id="editorder" class="modal fade" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog bounceInDown animated">
      <div class="modal-content">
         <form action="{{ url('admin/order/change-order') }}" method="post" id="id-edit-order" class="add-size" role="form" onsubmit="return false;" enctype='multipart/form-data'>
            @csrf
            <div class="modal-header">
               <h4 class="modal-title">Ship address  &quot;
                  <span data-ajax="edit" data-field="html">{{ $orderDetail->id }}</span>&quot;
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="category_name_input" class="control-label">Họ tên:<font color="#a94442">(*)</font></label>
                     <input type="text" class="form-control" name="name_order" id="name" value="{{ $orderDetail->name }}"
                        data-rule-required="true" data-msg-required="Vui lòng nhập tên.">
                  </div>
                  <input type="hidden" class="form-control" name="id_order" id="id_order" value="{{ $orderDetail->id }}">
                  <div class="form-group">
                     <label for="category_name_input" class="control-label">Số điện thoại:<font color="#a94442">(*)</font></label>
                     <input type="text" class="form-control" name="phone_order" id="phone" value="{{ $orderDetail->phone }}"
                        data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại.">
                  </div>
                  <div class="form-group">
                     <label for="category_name_input" class="control-label">Địa chỉ:<font color="#a94442">(*)</font></label>
                     <textarea name="address_order" class="form-control" id="address" cols="30" rows="4" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ.">{{ $orderDetail->address }}</textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
               <button type="submit" class="btn btn-info waves-effect waves-light" id="btn-save-order"><small class="ti-pencil-alt mr-2"></small>Sửa</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="{{ asset('public/admin/js/sweetalert2.all.js')}}"></script>
<script src="{{ asset('public/admin/css/toastr.min.js')}}"></script>
<script>
   $(document).ready(function() {
       const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 2000
       });
       $('select#order_status').change(function() {
               var status = $(this).val();
               var order_id = $("#order_id").val();
               var customer_id = $("#customer_id").val();
               $.ajax({
                   url: "{{ url('admin/order/change-status') }}",
                   type: "POST",
                   dataType: "JSON",
                   data: {status: status, order_id: order_id,customer_id: customer_id  },
                   headers: {
                       'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                   },
                   success: function(data){
                       console.log(data);
                       if(data.status == '_success') {
                        Toast.fire({
                            type: 'success',
                            title: data.msg
                        }).then(() => {
                            location.reload();
                        });
                       } else {
                        Toast.fire({
                            type: 'error',
                            title: data.msg
                        })
                       }
                   },
                   error: function(err){
                       console.log(err);
                   }
               });
       });
       $("#send-coupon").click(function() {
           $("#frm-coupon").validate({
               submitHandler: function() {
                   let action = $("#frm-coupon").attr('action');
                   let method = $("#frm-coupon").attr('method');
                   let form = $("#frm-coupon").serialize();
                   $.ajax({
                       url: action,
                       type: method,
                       data: form,
                       headers: {
                           'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                       },
                       dataType: 'JSON',
                       success: function(data) {
                           console.log(data);
                           if(data.status == '_success') {
                              Toast.fire({
                               type: 'success',
                               title: data.msg
                             }).then(() => {
                                location.reload();
                            });
                           } else {
                             Toast.fire({
                               type: 'error',
                               title: data.msg
                             })
                           }

                       },
                       error: function(err) {
                           console.log(err);
                       }
                   });

               }
           });
       });
   });
   $(document).on("click","#btn-save-cus",function() {
       $("#id-edit-cus").validate({
           submitHandler: function() {
               let action = $("#id-edit-cus").attr('action');
               let method = $("#id-edit-cus").attr('method');
               let form = $("#id-edit-cus").serialize();
               $.ajax({
                   url: action,
                   type: method,
                   data: form,
                   headers: {
                       'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                   },
                   dataType: 'JSON',
                   success: function(data) {
                       console.log(data);
                       if (data.status == '_error') {
                           Swal({
                               title: data.msg,
                               showCancelButton: false,
                               showConfirmButton: true,
                               confirmButtonText: 'OK',
                               type: 'error'
                           });
                       } else {
                           Swal({
                               title: data.msg,
                               showCancelButton: false,
                               showConfirmButton: false,
                               confirmButtonText: 'OK',
                               type: 'success',
                               timer: 2000
                           }).then(() => {
                               $("#id-edit-cus")[0].reset();
                               window.location.reload();
                           });
                       }
                   },
                   error: function(err) {
                       console.log(err);
                       Swal({
                           title: 'Error ' + err.status,
                           text: err.responseText,
                           showCancelButton: false,
                           showConfirmButton: true,
                           confirmButtonText: 'OK',
                           type: 'error'
                       });
                   }
               });

           }
       });
   });
   $(document).on("click","#btn-save-order",function() {
       $("#id-edit-order").validate({
           submitHandler: function() {
               let action = $("#id-edit-order").attr('action');
               let method = $("#id-edit-order").attr('method');
               let form = $("#id-edit-order").serialize();
               $.ajax({
                   url: action,
                   type: method,
                   data: form,
                   headers: {
                       'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                   },
                   dataType: 'JSON',
                   success: function(data) {
                       console.log(data);
                       if (data.status == '_error') {
                           Swal({
                               title: data.msg,
                               showCancelButton: false,
                               showConfirmButton: true,
                               confirmButtonText: 'OK',
                               type: 'error'
                           });
                       } else {
                           Swal({
                               title: data.msg,
                               showCancelButton: false,
                               showConfirmButton: false,
                               confirmButtonText: 'OK',
                               type: 'success',
                               timer: 2000
                           }).then(() => {
                               $("#id-edit-order")[0].reset();
                               window.location.reload();
                           });
                       }
                   },
                   error: function(err) {
                       console.log(err);
                       Swal({
                           title: 'Error ' + err.status,
                           text: err.responseText,
                           showCancelButton: false,
                           showConfirmButton: true,
                           confirmButtonText: 'OK',
                           type: 'error'
                       });
                   }
               });

           }
       });
   });
   $(document).on("click","#btn-save-comment",function() {
       $("#frmcomment").validate({
           submitHandler: function() {
               let action = $("#frmcomment").attr('action');
               let method = $("#frmcomment").attr('method');
               let form = $("#frmcomment").serialize();
               $.ajax({
                   url: action,
                   type: method,
                   data: form,
                   headers: {
                       'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                   },
                   dataType: 'JSON',
                   success: function(data) {
                       console.log(data);
                       if (data.status == '_error') {
                           Swal({
                               title: data.msg,
                               showCancelButton: false,
                               showConfirmButton: true,
                               confirmButtonText: 'OK',
                               type: 'error'
                           });
                       } else {
                           $("#frmcomment")[0].reset();
                           window.location.reload();
                       }
                   },
                   error: function(err) {
                       console.log(err);
                       Swal({
                           title: 'Error ' + err.status,
                           text: err.responseText,
                           showCancelButton: false,
                           showConfirmButton: true,
                           confirmButtonText: 'OK',
                           type: 'error'
                       });
                   }
               });

           }
       });
   });

</script>
@endsection

