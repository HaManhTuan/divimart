@extends('layouts.admin.admin_layout')
@section('content')
<div class="content">
<h2 class="page-title">Cấu hình Website <small></small></h2>
<div class="row">
   <div class="col-md-12">
      <section class="box">
         <div class="box-header">
            <h4><i class="fa fa-user"></i>Cấu hình <small></small></h4>
         </div>
         <div class="box-body">
            <form id="user-form" action="{{ url('admin/config/edit-config') }}" class="form-horizontal form-label-left"  method="post" enctype='multipart/form-data'>
               @csrf
               <fieldset>
                  <legend class="section">Thông tin web</legend>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Logo <span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <img src="{{ asset('public/uploads/images/config/'.$config->img_logo) }}" width="100">
                        <input type="hidden" name="logo_old" value="{{ $config->img_logo }}">
                        <input type="file" id="logo" name="logo" class="form-control input-transparent">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Icon <span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <img src="{{ asset('public/uploads/images/config/'.$config->icon) }}" width="100">
                        <input type="hidden" name="icon_old" value="{{ $config->icon }}">
                        <input type="file" id="icon" name="icon" class="form-control input-transparent">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Email <span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <input type="email" id="email" name="email" class="form-control" value="{{ $config->email }}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Số điện thoại <span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <input type="text" id="phone" name="phone" class="form-control " value="{{ $config->phone }}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Địa chỉ<span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <input type="text" id="address" name="address" class="form-control " value="{{ $config->address }}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Title<span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <input type="text" id="title" name="title" class="form-control " value="{{ $config->title }}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="last-name">Description<span class="required">*</span></ul></label>
                     <div class="col-sm-8">
                        <textarea name="description" class="form-control" rows="4">{{ $config->description }}</textarea>
                     </div>
                  </div>
               </fieldset>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary" id="edit-user">Sửa</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>
   </div>
</div>
</div>
<script src="{{ asset('public/admin/js/notify.js') }}"></script>
@if(Session::has('flash_message_error'))
<script>
   $.notify("{!! session('flash_message_error') !!}","error");
</script>
@endif
@if(Session::has('flash_message_success'))
<script>
   $.notify("{!! session('flash_message_success') !!}","success");
</script>
@endif
@endsection