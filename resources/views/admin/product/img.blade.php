@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/dropify.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-switch.css')}}">
<div class="content container">
    <h2 class="page-title">Danh mục - <span class="fw-semi-bold">Ảnh sản phẩm</span>
    </h2>
    <div class="row">
        <div class="col-md-6">
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Chi tiết <span class="fw-semi-bold">sản phẩm</span>
                    </h4>
                </div>
                <div class="box-body">
                	<table class="table table-bordered">
                			<tr>
                				<th>Tên sản phẩm:</th>
                				<th>{{ $product_detail->name }}</th>
                			</tr>
                			<tr>
                				<td>Danh mục</td>
                				<td>{{ $product_detail->category->name  }}</td>
                			</tr>
                			 <tr>
				              <td>Giá sản phẩm</td>
				              <td><span>{{ number_format($product_detail->price)  }}</span></td>
				            </tr>
                	</table>
                </div>
                </section>
            </div>
            <div class="col-md-6">
	            <section class="box">
	                <div class="box-header" style="display: flex;justify-content: space-between;">
	                    <h4>
	                        Thêm ảnh <span class="fw-semi-bold">sản phẩm</span>
	                    </h4>
	                </div>
	                <form role="form" id="addAttributeForm" method="POST" action="{{ url('admin/product/add-image/'.$product_detail->url) }}" enctype='multipart/form-data' >
      				@csrf
	                <div class="box-body">
                	 <fieldset>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="file" multiple="multiple" class="multi with-preview" name="file[]" id="uploadimg" />
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-7" style="margin-top: 15px; margin-left: 0%;">
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn btn-primary" id="btn-save">Thêm ảnh</button>
                                </div>
                            </div>
                        </fieldset>
	                </div>
	            	</form>
	            </section>
	        </div>
        </div>
            <div class="row">
       <div class="col-md-6">
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Danh sách <span class="fw-semi-bold"> ảnh của sản phẩm</span>
                    </h4>
                </div>
                <div class="box-body">
                  <table class="table table-bordered" id="img-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Hành Động</th>
                      </tr>
                    </thead>
                    <tbody>
                    	 @foreach ($product_img as $value)
                      <tr id="tr-item-{{$value->id}}" class="tr-item">
                        <td>{{$value->id}}</td>
                        <td><img src="{{ asset('public/uploads/images/products/'.$value->img) }}" style="width: 200px; border-radius: 10%"></td>
                        <td><a data-id="{{$value->id}}" class="btn btn-danger btn-del"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </section>
            </div>
    </div>
    </div>
    <style>
  .MultiFile-list{
    border: 1px solid #e2e4e6;
    margin-top: 5px;
    padding: 5px;
  }
  .MultiFile-preview{
   float: right;
 }
 .MultiFile-title{
  color:#e1e1e1;
  margin-left: 30px;
}
.MultiFile-label{
  margin-bottom: 24px;
  padding-bottom: 19px;
}
.MultiFile-remove{
position: absolute;
background: #e2e4e6;
width: 22px;
text-align: center;
color: black;
border-radius: 40px;
padding-bottom: 3px;
}
.MultiFile-remove:hover{
  background: rgb(97, 143, 176);
  color:white;

}
.MultiFile-preview
{
  max-width: 10% !important;
}
</style>


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
<script src="{{ asset('public/admin/js/jquery.MultiFile.js') }}"></script>
<script>
    $(function(){
		    $('.with-preview').MultiFile();
		  });
$(document).on('click', '.btn-del', function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 ảnh.</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
          url: '{{ url('admin/product/delete-img') }}',
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
                              $("#tr-item-" + id).remove();
                              if ($("#img-table .tr-item").length == 0) {
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