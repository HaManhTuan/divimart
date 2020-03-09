@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/jquery-ui.css')}}">
<div class="content">
    <h2 class="page-title">Mã giảm giá - <span class="fw-semi-bold">đơn hàng</span>
    </h2>
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header">
                    <h4 class="pull-left">
                        Danh sách <span class="fw-semi-bold">mã giảm giá</span>
                    </h4>
                    <button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#add-coupon-modal">
                        <i class="fa fa-plus"></i>
                        Thêm mã giảm giá
                    </button>
                </div>
                <div class="box-body">
                  <table id="product-table" class="table table-bordered table-hover coupon">
                   <thead>
                     <tr>
                       <th>Mã code</th>
                       <th>Thời gian</th>
                       <th>Số lượng</th>
                       <th>Loại</th>
                       <th>Hành động</th>
                     </tr>
                   </thead>
                   <tbody>
                    @php
                    $stt = 1;
                    @endphp
                    @foreach($coupon as $coupon)
                    <tr id="tr-item-{{ $coupon->id }}" class="tr-item">
                      <td>{{ $coupon->coupon_code }}</td>
                      <td>{{ $coupon->expiry_date }}</td>
                      <td>
                        {{ $coupon->amount }}
                      </td>
                      <td>
                        {{ $coupon->amount_type}}
                      </td>
                      <td>
                        <a href="" data-id="{{ $coupon->id}}" class="btn btn-sm btn-success btn-edit-coupon" data-toggle="tooltip" title="Sửa"><i class="fa fa-edit"></i></a>
                        <a href="" data-id="{{ $coupon->id}}" class="btn btn-sm btn-danger btn-del-coupon ml-1" data-toggle="tooltip" title="Xóa"><i class="fa fa-trash"></i></a>
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
<div id="add-coupon-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 400px;">
    <div class="modal-content">
      <form action="{{url('admin/coupon/add-coupon')}}" method="POST" id="addCouponForm" onsubmit="return false;">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Thêm mã mới</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="category_name_input" class="control-label">Mã code <font color="#a94442">(*)</font></label>
            <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="Nhập code." data-rule-required="true" data-msg-required="Vui lòng nhập code."/>
          </div>
          <div class="form-group">
            <label for="category_name_input" class="control-label">Ngày hết hạn<font color="#a94442">(*)</font></label>
            <input type="text" class="form-control" id="expiry_date" name="expiry_date" data-rule-required="true" data-msg-required="Vui lòng nhập ngày.">
          </div>
          <div class="form-group">
            <label class="control-label">Số lượng</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Nhập số lượng." data-rule-required="true" data-msg-required="Vui lòng nhập số lượng."/>
          </div>
          <div class="form-group">
            <label for="category_name_input" class="control-label">Loại mã giảm giá <font color="#a94442">(*)</font></label>
            <select name="amount_type" id="amount_type" class="form-control">
              <option value="Persentage">Persentage</option>
              <option value="Fix">Fix</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light btn-add-save"><small class="ti-save mr-2"></small>Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="edit-coupon-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 400px;">
    <div class="modal-content">
      <form action="{{url('admin/coupon/edit-coupon')}}" method="POST" id="editCouponForm" onsubmit="return false;">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Sửa slide  &quot;
            <span data-ajax="edit" data-field="html"></span>&quot;
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light btn-edit-save"><small class="ti-save mr-2"></small>Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  label.error{
    font-size: 14px;
    color: red;
    margin: 8px;
  }
</style>
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script src="{{ asset('public/admin/js/jquery-ui.js') }}"></script>
<script>
    $("#expiry_date").datepicker({ minDate:0, dateFormat: 'dd-mm-yy'});
    $("#edit-coupon-modal #expiry_date_edit").datepicker({ minDate:0, dateFormat: 'dd-mm-yy'});
    $('#edit-coupon-modal').on('shown.bs.modal', function() {
     $('#edit-coupon-modal #expiry_date_edit').datepicker({ format: 'dd-mm-yyyy',});
});
</script>
<script>
  $(".btn-add-save").click(function() {
    $("#addCouponForm").validate({
      submitHandler: function() {
        let action = $("#addCouponForm").attr('action');
        let method = $("#addCouponForm").attr('method');
        let formData = $("#addCouponForm").serialize();
        $.ajax({
          url: action,
          type: method,
          data: formData,
          dataType: 'JSON',
          headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
          },
          success: function(data) {
            console.log(data);
            $("#add-coupon-modal").modal('hide');
            $('#addCouponForm')[0].reset();
            if(data.status == '_success') {
              Swal({
                title: data.msg,
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonText: 'OK',
                type: 'success',
                timer: 2000
              }).then(() => {
                location.reload();
              });
            } else {
             Swal({
              title: data.msg,
              showCancelButton: false,
              showConfirmButton: true,
              confirmButtonText: 'OK',
              type: 'error'
            });
           }
         },
         error: function(err) {
          console.log(err);
        }
      });
      }
    });
  });
  //Modal-Edit
  $(".btn-edit-coupon").click(function() {
    let id = $(this).attr('data-id');
    $.ajax({
      url: '{{url("admin/coupon/edit-modal")}}',
      type: 'POST',
      data: {id: id},
      dataType: 'JSON',
      headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
      },
      success:function(data) {
        $("#edit-coupon-modal .modal-body").html(data.body);
        $('[data-ajax="edit"]').html(data.name);
        $('#edit-coupon-modal .modal-body select.amount_type option[value='+data.amount_type+']').prop("selected", true);
        $("#edit-coupon-modal").modal('show');
      },
      error: function(err) {
        console.log(err);
        Swal({
          title: "Error " + err.status,
          text: err.responseText,
          showCancelButton: false,
          showConfirmButton: true,
          confirmButtonText: 'OK',
          type: 'error'
        });
      }
    });
    return false;
  });
  //EditAction
  $(".btn-edit-save").click(function() {
    $("#editCouponForm").validate({
      submitHandler: function() {
        let action = $("#editCouponForm").attr('action');
        let method = $("#editCouponForm").attr('method');
        let formData = $("#editCouponForm").serialize();
        $.ajax({
          url: action,
          type: method,
          data: formData,
          dataType: 'JSON',
          headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
          },
          success: function(data) {
            console.log(data);
            $("#edit-coupon-modal").modal('hide');
            $('#editCouponForm')[0].reset();
            if(data.status == '_success') {
              Swal({
                title: data.msg,
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonText: 'OK',
                type: 'success',
                timer: 2000
              }).then(() => {
                location.reload();
              });
            } else {
             Swal({
              title: data.msg,
              showCancelButton: false,
              showConfirmButton: true,
              confirmButtonText: 'OK',
              type: 'error'
            });
           }
         },
         error: function(err) {
          console.log(err);
        }
      });
      }
    });
  });
  $(".btn-del-coupon").on('click',function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 mã giảm giá.</p><p>Bạn có chắn chắn muốn xóa?</p>',
      showConfirmButton: true,
      confirmButtonText: '<i class="ti-check" style="margin-right:5px"></i>Đồng ý',
      confirmButtonColor: '#ef5350',
      cancelButtonText: '<i class="ti-close" style="margin-right:5px"></i> Hủy bỏ',
      showCancelButton: true,
      focusConfirm: false,
      reverseButtons: true
    }).then((result) => {
      if (result.value == true) {
        $.ajax({
          url: '{{ url('admin/coupon/delete-coupon') }}',
          type: 'POST',
          data: {id: id, length: '1'},
          dataType: 'JSON',
          headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
          },
          success: function(data) {
                          //console.log(data);
                          if(data.status == '_success') {
                            Swal({
                              title: data.msg,
                              showCancelButton: false,
                              showConfirmButton: false,
                              type: 'success',
                              timer: 2000
                            }).then(() => {
                              $("#tr-item-" +id).remove();
                              if ($(".coupon .tr-item").length == 0) {
                                location.reload();
                              }
                            });
                          } else {
                            Swal({
                              title: data.msg,
                              showCancelButton: false,
                              showConfirmButton: true,
                              confirmButtonText: 'OK',
                              type: 'error'
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
      return false;
    });
    return false;
  });
</script>

@endsection