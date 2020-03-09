@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/plugins/iCheck/all.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/select2/dist/css/select2.min.css') }}">
    <section class="content-header">
      <h1>
        Người dùng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Quản lý người dùng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
      		        <button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#add-admin-modal">
      		        <i class="fa fa-plus"></i>
      		        Add Admin/User
      		        </button>
      		    </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-user" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Loại</th>
                    <th>Quyền</th>
                    <th>TT</th>
                    <th>Ngày tạo</th>
                    <th style="width: 80px;">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($admin_data as $value)
                            @php 
                              if ($value->type=="Admin")
                              {
                                $role = "All";
                              } 
                              else {
                                $role = "";
                                if ($value->category_access == 1) {
                                  $role .="Category,";
                                }
                                if ($value->product_access == 1) {
                                  $role .="Product,";
                                }
                                if ($value->order_access == 1) {
                                  $role .="Order,";
                                }
                                if ($value->store_access == 1) {
                                  $role .="Store,";
                                }
                                if ($value->config_access == 1) {
                                  $role .="Config,";
                                }
                                 if ($value->user_access == 1) {
                                  $role .="User,";
                                }
                                 if ($value->customer_access == 1) {
                                  $role .="Customer";
                                }
                              }
                            @endphp
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->type }}</td>
                                <td>{{ $role }}</td>
                                <td style="text-align: center;">
                                    @if ($value->admin == 0)
                                       <i class="fa fa-circle text-center text-danger mt-sm"></i>
                                    @else
                                    <i class="fa fa-circle text-success"></i>
                                    @endif
                                </td>
                                <td>{{ $value->updated_at }}</td>
                                <td>
                                    <a href="{{ url('admin/user/edit-user/'.$value->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('admin/user/del-user') }}" data-id="{{ $value->id }}" class="btn btn-danger btn-del-user"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
      </div>
    </section>
    <div id="add-admin-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 800px;">
    <div class="modal-content">
      <form action="{{url('admin/user/add-user')}}" method="POST" id="addAdminForm" onsubmit="return false;">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Thêm người dùng mới</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="category_name_input" class="control-label">Tên: <font color="#a94442">(*)</font></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên." data-rule-required="true" data-msg-required="Vui lòng nhập tên."/>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="category_name_input" class="control-label">Email: <font color="#a94442">(*)</font></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email." data-rule-required="true" data-msg-required="Vui lòng nhập email."/>
                  </div>
                </div> 
                <div class="col-md-4">
                 <div class="form-group mb-3">
                    <label for="category_name_input" class="control-label">Mật khẩu: <font color="#a94442">(*)</font></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu." data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu."/>
                  </div>
                </div>
           </div>
           <div class="row">
           	    <div class="col-md-6"> 
		              <div class="form-group">
		                <label>Loại: <font color="#a94442">(*)</font></label>
		                <select class="form-control select2" style="width: 100%;" id="type" name="type">
		                    <option value="Admin">Admin</option>
		                    <option value="User">User</option>
		                </select>
		              </div>
		        </div>
                <div class="col-md-2">
                  <div class="form-group mb-3">
                    <label for="category_name_input" class="control-label">Trạng thái: <font color="#a94442">(*)</font></label>
		                <label>
		                  <input type="checkbox" class="minimal" value="1" name="admin">
		                  Enable
		                </label>
                  </div>
                </div>
           </div>
           <div class="row">
	   	            <div class="col-md-12" id="access">
		                <div class="form-inline mb-3">
		                      <label for="category_name_input" class="control-label">Quyền: <font color="#a94442">(*)</font></label>
		                      <div class="list-role" style="margin-top: 5px;">
			                        <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="category_access">
						                  Danh mục
						                </label>
			                        </div>
			                        <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="product_access">
						                  Sản phẩm
						                </label>
			                        </div>
			                        <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="store_access">
						                  Store
						                </label>
			                        </div>
			                        <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="order_access">
						                  Đơn hàng
						                </label>
			                        </div>
			                        <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="config_access">
						                  Cấu hình
						                </label>
			                        </div>
						            <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="customer_access">
						                  Khách hàng
						                </label>
				                    </div>
				                    <div class="col-md-3">
				                        <label>
						                  <input type="checkbox" class="minimal" value="1" name="user_access">
						                  Người dùng
						                </label>
				                    </div>
			                  </div>
		                </div>
	                </div>
	       </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-success waves-effect waves-light btn-add-save"><small class="ti-save mr-2"></small>Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
	.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 25px;
}
</style>
    <!-- DataTables -->
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script src="{{  asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{  asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    $('#table-user').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
      $(".select2").select2();
	  $("#access").hide();
	  $("#type").change(function(){
	      var type = $(this).val();
	      if (type == "Admin") {
	          $("#access").hide();
	      }else{
	          $("#access").show();
	      }
	  });
  })
    $(".btn-add-save").click(function() {
    $("#addAdminForm").validate({
        submitHandler: function() {
          let action = $("#addAdminForm").attr('action');
          let method = $("#addAdminForm").attr('method');
          let formData = $("#addAdminForm").serialize();
          $.ajax({
            url: action,
            type: method,
            data: formData,
            //dataType: 'JSON',
            headers: {
              'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
            success: function(data) {
              console.log(data);
              $("#add-admin-modal").modal('hide');
              $('#addAdminForm')[0].reset();
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
               Swal({
                title: data.err,
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
      $(".btn-del-user").on('click',function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 tài khoản.</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
          url: '{{ url('admin/user/delete-user') }}',
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