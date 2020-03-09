@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/dropify.css')}}">
<div class="content">
        
        <div class="row">
            <div class="col-md-12">
                <section class="box">
                    <div class="box-header">
                        <h4>
                            Quản lý <span class="fw-semi-bold">Slide</span>
                                        <button type="button" class="btn btn-success btn-xs pull-right" onclick="window.location.href='{{ url('admin/media/add-media') }}'">
                <i class="fa fa-plus"></i>
                Thêm Slide
            </button>
                        </h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                            	
                            <tr>
                                <th class="hidden-xs">ID</th>
                                <th>Ảnh</th>
                                <th class="hidden-xs">Hành động</th>
                            </tr>
                         
                            </thead>
                            <tbody>
                            	@php
                            		$stt =1;
                            	@endphp
                            	 @foreach ( $media as $item)
		                            <tr>
		                                <td class="hidden-xs">{{ $stt++ }}</td>
		                                <td>
		                                    <img class="img-rounded" src="{{ asset('public/uploads/images/sliders/'.$item['image']) }}" alt="" width="350" height="250">
		                                </td>
		                                <td class="hidden-xs text-muted">
		                                    <button type="button" class="btn btn-success btn-sm btn-edit-category btn-edit" data-id="{{ $item->id}}" data-placement="top" data-original-title=".btn .btn-success .btn-sm">Sửa</button>
                            				<button type="button" class="btn btn-danger btn-sm btn-del-cate btn-del" data-id="{{ $item->id }}" data-placement="top" data-original-title=".btn .btn-danger .btn-sm" >Xóa</button>
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
        <!-- Modals sửa category -->
<div id="edit-media-modal" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <form action="{{url('admin/media/edit-media')}}" method="post" id="editSliderForm" role="form" onsubmit="return false;" enctype='multipart/form-data'>
      <div class="modal-header">
        <h4 class="modal-title">Sửa slide  &quot;
          <span data-ajax="edit" data-field="html"></span>&quot;
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
        <button type="submit" class="btn btn-info waves-effect waves-light btn-edit-save"><small class="ti-pencil-alt mr-2"></small>Cập nhật</button>
      </div>
    </form>
  </div>
</div>
</div>             
<script src="{{ asset('public/admin/js/dropify.js') }}"></script>
<script>
	  $(document).on("click", ".btn-edit", function() {
      let id = $(this).attr('data-id');
      $.ajax({
        url: '{{url("admin/media/edit-modal")}}',
        type: 'POST',
        data: {id: id},
        dataType: 'JSON',
        headers: {
          'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        },
        success:function(data) {
          $("#edit-media-modal .modal-body").html(data.body);
          $('[data-ajax="edit"]').html(data.name);
          $(".dropify").dropify();
          $("#edit-media-modal").modal('show');
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
    $(document).on('click', ".btn-edit-save", function() {
      let action = $("#editSliderForm").attr('action');
      let method = $("#editSliderForm").attr('method');
      let form = document.querySelector("#editSliderForm");
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
          //console.log(data);
          if (data.status == '_error') {
            Swal({
              title: data.msg,
              type: 'error',
              showCancelButton: false,
              showConfirmButton: true,
              confirmButtonText: 'OK'
            });
          } else {
            Swal({
              title: data.msg,
              type: 'success',
              showCancelButton: false,
              showConfirmButton: false,
              timer: 2000
            }).then(() => {
              window.location.href = '{{url("admin/media/view-media")}}';
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
    });
    $(".btn-del").on('click',function() {
      let id = $(this).attr('data-id');
      Swal({
        title: 'Xác nhận xóa?',
        type: 'error',
        html: '<p>Bạn sắp xóa 1 slide ảnh.</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
            url: '{{ url('admin/media/delete') }}',
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