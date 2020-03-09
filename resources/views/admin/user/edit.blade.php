@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/iCheck/all.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/select2/dist/css/select2.min.css') }}">
    <section class="content-header">
      <h1>
       Chỉnh sửa người dùng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Chỉnh sửa người dùng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              	 Chỉnh sửa người dùng số 
		      </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            						<form class="form-horizontal" id="editAdminForm" method="POST" action="{{ url('admin/user/edit-post-user') }}" enctype='multipart/form-data' onsubmit="return false;">
                        <fieldset>
                          <input type="hidden" name="id" value="{{ $userID->id }}">
                                <div class="form-group">
                                    <label for="normal-field" class="col-sm-3 control-label">Tên người dùng:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Hãy nhập tên" data-rule-required="true" data-msg-required="Vui lòng nhập tên người dùng." value="{{ $userID->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="normal-field" class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-7">
                                        <input type="email" id="email" name="email" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập email." value="{{ $userID->email }}" readonly="">
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="normal-field" class="col-sm-3 control-label">Mật khẩu:</label>
                                    <div class="col-sm-7">
                                        <input type="password" id="password" name="password" class="form-control"  value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="normal-field" class="col-sm-3 control-label">Trạng thái:</label>
                                    <div class="col-sm-7">
                                    	<div class="checkbox checkbox-primary">
					                        <input class="minimal" type="checkbox" id="checkbox9"  value="1" name="admin">
					                        <label for="checkbox9">
					                            Enable
					                        </label>
					                    </div>
                                    </div>
                                </div>
                                @if ($userID->admin == 1)
                                <script>
                                	$("#checkbox9").prop('checked', true);
                                </script>
                                @else
                                <script>
                                	$("#checkbox9").prop('checked', false);
                                </script>
                                @endif
                                <div class="form-group">
                                    <label for="normal-field" class="col-sm-3 control-label">Loại tài khoản:</label>
                                    <div class="col-sm-7">
										<input type="text" name="type" class="form-control" value="{{ $userID->type }}" id="type" readonly="">
                                    </div>
                                </div>
                                @if ($userID->type =="User")
                                	<div class="form-group">
                                    <label for="normal-field" class="col-sm-3 control-label">Quyền:</label>
                                    <div class="col-sm-7">
    			                          <div class="list-role">
   													
    			                             <div class="checkbox checkbox-primary">
    			                                <input type="checkbox" class="minimal" value="1" name="category_access" @if ($userID->category_access == 1)checked=""@endif>
    			                                    <label for="checkbox3">
    			                                    Danh mục
    			                                </label>
    			                           </div>
    
    			                            <div class="checkbox checkbox-primary">
    			                                <input class="minimal" type="checkbox"  value="1" name="product_access" @if ($userID->product_access == 1)checked=""@endif>
    			                                <label for="checkbox3">
    			                                    Sản phẩm
    			                                </label>
    			                            </div>
    			                            <div class="checkbox checkbox-primary" >
    			                                <input class="minimal" type="checkbox"  value="1" name="store_access" @if ($userID->store_access == 1)checked=""@endif>
    			                                <label for="checkbox8">
    			                                    Store
    			                                </label>
    			                            </div>
    			                            <div class="checkbox checkbox-primary">
    			                                <input class="minimal" type="checkbox"  value="1" name="order_access" @if ($userID->order_access == 1)checked=""@endif>
    			                                <label for="checkbox4">
    			                                    Đơn hàng
    			                                </label>
    			                            </div>
    			                            <div class="checkbox checkbox-primary">
    			                                <input class="minimal" type="checkbox"  value="1" name="config_access"@if ($userID->config_access == 1)checked=""@endif>
    			                                <label for="checkbox5">
    			                                    Cấu hình
    			                                </label>
    			                            </div>
    			                            <div class="checkbox checkbox-primary">
    			                                <input class="minimal" type="checkbox"  value="1" name="customer_access" @if ($userID->customer_access == 1)checked=""@endif>
    			                                <label for="checkbox6">
    			                                    Khách hàng
    			                                </label>
    			                            </div>
    			                            <div class="checkbox checkbox-primary">
    			                                <input class="minimal" type="checkbox"  value="1" name="user_access" @if ($userID->user_access == 1)checked=""@endif>
    			                                <label for="checkbox7">
    			                                    Người dùng
    			                                </label>
    			                            </div>
    			                          </div>
                                    </div>
                                </div>
                                @endif
                        </fieldset>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-offset-2 col-sm-7" style="margin-left: 25%; ">
                                    <div class="btn-toolbar">
                                        <button type="submit" class="btn btn-primary" id="btn-save" style="padding: 5px 80px;">Sửa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
      </div>
      </div>
    </section>
<script src="{{  asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{  asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  	  $("#btn-save").click(function() {
    $("#editAdminForm").validate({
      submitHandler: function() {
        let action = $("#editAdminForm").attr('action');
        let method = $("#editAdminForm").attr('method');
        let form = $("#editAdminForm").serialize();
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
                window.location.href = "{{ url('admin/user/view-user') }}";
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
    $("#btn-reset").click(function() {
    $("#resetAdminForm").validate({
      submitHandler: function() {
        let action = $("#resetAdminForm").attr('action');
        let method = $("#resetAdminForm").attr('method');
        let form = $("#resetAdminForm").serialize();
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
  })
  </script>
@endsection