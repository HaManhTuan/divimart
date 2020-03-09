@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/dropify.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-switch.css')}}">
<div class="content container">
    <h2 class="page-title">Sửa bài viết số {{ $idBlog->id }}<small></small></h2>
        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <div class="body">
						<form class="form-horizontal" id="editProductForm" method="POST" action="{{ url('admin/blog/editaction') }}" enctype='multipart/form-data' onsubmit="return false;">
                            <fieldset>
                              <input type="hidden" name="blog_id" value="{{ $idBlog->id }}">
                                <div class="form-group">
                                    <label for="normal-field" class="col-sm-2 control-label">Tên bài viết:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Hãy nhập tên bài viết" data-rule-required="true" data-msg-required="Vui lòng nhập tên bài viết." value="{{ $idBlog->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="normal-field" class="col-sm-2 control-label">Mô tả bài viết:</label>
                                    <div class="col-sm-7">
                                        <textarea name="description" id="description" row="3" class="form-control" placeholder="Hãy nhập mô tả bài viết" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả bài viết.">{{ $idBlog->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                     <label class="col-sm-2 control-label" for="description">Ảnh đại diện bài viết:</label>
                                        <div class="col-sm-7">
                                             <input type="file" name="file" id="file" class="dropify" accept="image/*" data-show-loader="true"  data-default-file="{{ asset('public/uploads/images/blogs/'.$idBlog->img) }}"/>
                                    <input type="hidden" name="old_file" value="{{ $idBlog->img }}">
                                        </div>
                                 </div>
                                <div class="form-group">
                                  <label class=" col-sm-2 control-label" for="hint-field">Nội dung bài viết:</label>
                                     <div class="col-sm-10">
                                      <textarea name="content" id="content" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập chi tiết bài viết.">{!! $idBlog->content !!}</textarea>
                                       <script>CKEDITOR.replace('content','', 'full')</script>
                                     </div>
                                </div>
                                <div class="form-group">
                                     <label class="col-sm-2 control-label" for="description">Trạng thái:</label>
                                      <div class="col-sm-7">
                                        <input type="checkbox" {{ ($idBlog->status == '1') ? 'checked' : '' }} data-on-color="success" data-off-color="warning" id="status" name="status">
                                      </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-offset-2 col-sm-7" style="margin-left: 15%; ">
                                        <div class="btn-toolbar">
                                            <button type="submit" class="btn btn-primary" id="btn-save">Sửa</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
</div>
<script src="{{ asset('public/admin/js/function.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('public/admin/js/dropify.js') }}"></script>
<script>
    $("#status").bootstrapSwitch();
</script>

<script>
// Dropify
$(".dropify").dropify();
  $("#btn-save").click(function() {
    $("#editProductForm").validate({
      submitHandler: function() {
        let action = $("#editProductForm").attr('action');
        let method = $("#editProductForm").attr('method');
        let form = document.querySelector("#editProductForm");
        var formData = new FormData(form);
        $.ajax({
          url: action,
          type: method,
          processData: false,
          contentType: false,
          data: formData,
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
                window.location.href = "{{ url('admin/blog/view-blog') }}";
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
</script>
@endsection
