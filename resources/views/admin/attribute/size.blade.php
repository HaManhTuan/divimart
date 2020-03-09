@extends('layouts.admin.admin_layout')
@section('content')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

<div class="content">
        <h2 class="page-title">Thêm mới  - <span class="fw-semi-bold">Size</span></h2>
        <div class="row">
            <div class="col-md-4">
                <section class="box">
                    <div class="box-header">
                        <h4>
                            Thêm <span class="fw-semi-bold">Size</span>
                        </h4>
                    </div>
                    <div class="box-body">
                        <form action="{{ url('admin/attribute/view-attribute-size') }}" method="POST" >
								@csrf
								<div class="form-inline">
									<div class="field_wrapper_size">
										<input type="text" name="size[]"  id="size"  class="form-control" placeholder="Hãy nhập size" style="width: 200px;">
										<a href="javascript:void(0);" class="btn btn-primary add_button_size"><i class="glyphicon glyphicon-plus"></i></a>
									</div>
								</div>
								<button type="submit" class="btn btn-success mt-1 mb-1 save-size" style=" margin-top: 10px;"><span class="glyphicon glyphicon-ok" style="margin-right: 5px;"></span>Save</button>
							</form>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section class="box">
                    <div class="box-header">
                        <h4 class="title-table">
                            Quản lý <span class="fw-semi-bold">Size</span>
                        </h4>
                    </div>
                    <div class="box-body">
                    	<table class="table table-bordered table-lg mt-lg mb-0">
                            <thead>
                            <tr>
                                <th style="width:50px;">ID</th>
                                <th>Size</th>
                                <th style="width: 150px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            	@foreach($data_size as $data_size)
                            <tr>
                                <td>
									{{ $data_size->id }}
                                </td>
                                <td>{{ $data_size->size }}</td>
                                <td><a href="" class="btn btn-danger del-size" data-id="{{ $data_size->id }}"><i class="glyphicon glyphicon-trash"></i></a></td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <script>
    		$(document).ready(function() {
				let maxField = 10;
				let addButton = $('.add_button_size');
				let wrapper = $('.field_wrapper_size');
				let fieldHTML='<div class="field_wrapper_add_color" style="margin-top:2px;"><input type="text" name="size[]"  id="size"  class="form-control" placeholder="Hãy nhập size" style="width: 200px;"><a href="javascript:void(0);" class="btn btn-danger remove_button_color" style="margin-left:3px;"><i class="glyphicon glyphicon-trash"></i></a></div>';
				let x =1;
				$(addButton).click(function(){
					if(x < maxField){
						x++;
						$(wrapper).append(fieldHTML);
					}
				});
				$(wrapper).on('click','.remove_button_color', function(e){
					e.preventDefault();
					$(this).parent('div .field_wrapper_add_color').remove();
					x--;
				});
			});
  $(".del-size").on('click',function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 size.</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
          url: '{{ url('admin/attribute/del-attribute-size') }}',
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