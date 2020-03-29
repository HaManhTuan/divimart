@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<section class="content-header">
  <h1>
    Quản lý sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Sản phẩm</li>
  </ol>
</section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             
                    <button type="button" class="btn btn-success btn-xs pull-right" onclick='window.location.href="{{ url('admin/product/add') }}"'>
                        <i class="fa fa-plus"></i>
                        Thêm sản phẩm 
                    </button>
                    <button class="btn btn-danger float-right" style="display: none;padding-top: 5px;" id="btn-del-all" data-action="{{url("admin/category/delete")}}">
                        <i class="fas fa-trash-alt mr-2"></i>
                        Xóa <span></span> mục đã chọn?
                    </button>
  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <table id="table-product" class="table table-bordered">
                        <thead>
                        <tr>
                          <th>
                            <div class="checkbox"><input id="checkbox1" type="checkbox" data-check-all=""  value="checkall" data-action="checkall" class="checkone" style="margin-left: 0px !important;">
                            <label for="checkbox1"></label>
                            </div>
                            </th>
                            <th>Sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th class="no-sort hidden-xs">Ảnh</th>
                            <th>Trạng thái</th>
                            <th class="hidden-xs">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach ($products as $key => $product)
                        <tr id="dd-item-{{ $product->id }}" class="tr">
                              <td>
                                    <div class="checkbox">
                                        <input id="checkbox{{ $product->id }}" type="checkbox" class="checkone" data-id="{{ $product->id }}" style="margin-left: 0px !important;">
                                        <label for="checkbox{{ $product->id }}"></label>
                                    </div>
                                </td>
                            <th>{{ $product->name }}</th>
                            <th>{{ $product->category->name }}</th>
                            <th>
                              <p>
                         Giá gốc: <span class="text-danger" style="font-weight: bold;"> {{ number_format($product->price) }} VNĐ</span>
                       </p>
                       @if ($product->promotional_price < $product->price && $product->promotional_price > 0 )
                       <p style="color: #56bc76">
                        Giá KM: <span class="text-danger" style="font-weight: bold;"> {{ number_format($product->promotional_price) }} VNĐ </span>
                      </p>
                      @endif
                      <p>
                         @if( 0 < $product->sale && $product->sale < 99.9)
                         Sale: <label class="badge badge-danger">{{ $product->sale }} %</label>
                        @endif
                    </th>
                            <th><img src="{{asset('public/uploads/images/products/'.$product->image)}}" alt="{{$product->name}}" width="100" class="img-fluid d-block ml-auto mr-auto" style="border-radius: 10px;" /></th>
                            <th>
                               <span class="{{$product_class_status[$key]}}" style="display: block;min-width: 70px;">{{$product_status[$key]}}</span>
                            </th>
                            <th class="no-sort hidden-xs">
                              <div>
                                <button type="button" class="btn btn-success btn-sm btn-edit-category" data-placement="top" data-original-title=".btn .btn-success .btn-sm"  data-toggle="modal" data-target="#edit-category-modal" onclick='window.location.href="{{ url('admin/product/edit-pro/'.$product->url) }}"'><span class="glyphicon glyphicon-pencil" style="margin-right: 5px;"></span>Sửa</button>
                              <button type="button" class="btn btn-danger btn-sm btn-del-pro" data-placement="top" data-original-title=".btn .btn-danger .btn-sm"  data-id="{{ $product->id }}" data-action=""><span class="glyphicon glyphicon-trash" style="margin-right: 5px;"></span>Xóa</button>
                              </div>
                              <div style="margin-top: 3px;">
                                <button type="button" class="btn btn-info btn-sm btn-edit-category" data-placement="top" data-original-title=".btn .btn-info .btn-sm"  data-toggle="modal" data-target="#edit-category-modal"  data-id="{{ $product->id}}" data-action="" onclick='window.location.href="{{ url('admin/product/add-image/'.$product->url) }}"'><i class="fa fa-file-image-o" style="margin-right: 5px;"></i>Ảnh</button>
                              <button type="button" class="btn btn-primary btn-sm btn-size" data-placement="top" data-original-title=".btn .btn-primary .btn-sm"  data-id="{{ $product->id }}" data-toggle="modal" data-target="#addsizemodal"><i class="fa fa-cubes" style="margin-right: 5px;"></i>Size</button>
                              </div>


                            </th>
                        </tr>
                   @endforeach
                        </tbody>
                    </table>
            </div>
            </div>
          </div>
        </div>
      </section>
<!-- Modal Size-->
<div id="addsizemodal" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
  
      <div class="modal-header">
        <h4 class="modal-title">Add Size  &quot;
          <span data-ajax="edit" data-field="html"></span>&quot;
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

{{--           <a href="#" class="btn-all btn btn-success" data-action="checkall" id="checkboxmodal"><i class="glyphicon glyphicon-plus" style="color:white;margin-right: 5px;"></i>Chọn hết</a> |
          <a href="#" class="btn-delall btn btn-danger" data-action="nonecheckall" id="checkboxnonemodal"><i class="glyphicon glyphicon-trash" style="color:white;margin-right: 5px;"></i>Xóa hết</a> |
          <button type="submit" class="btn btn-info waves-effect waves-light" id="btn-save-size"><small class="ti-pencil-alt mr-2"></small>Add Size</button> --}}
   
        <div class="row" style="margin-top: 5px;">
{{--           <div class="col-md-4">
            <div class="form-group">
                <form action="{{ url('admin/product/add-size') }}" method="post" id="id-add-size" class="add-size" role="form" onsubmit="return false;" enctype='multipart/form-data'>
                    <div class="row">
                          <input type="hidden" name="product_id" value="" class="product_id">
                           <input type="hidden" name="stock" value="" class="stock">
                      @foreach($size as $size)
                      <div class="col-md-6">
                          <div>
                            <input type="checkbox" class="checkonemodel" id="checkboxmodal-{{ $size->id }}" name="size[]" id="size" value="{{ $size->id }}"> {{ $size->size }}
                          </div>
                            <label class="container-checkbox" style="margin-left: 10px;">{{ $size->size }}
                              <input type="checkbox" class="checkonemodel" name="size[]" id="size" value="{{ $size->id }}">
                              <span class="checkmark"></span>
                            </label>
                      </div>
                      @endforeach
                    </div>
                  </form>
            </div>
          </div> --}}
           <form action="{{ url('admin/product/edit-stock') }}" method="post" id="frm-edit-stock" class="add-size" role="form" onsubmit="return false;" enctype='multipart/form-data'>
          <div class="col-md-8 table-size">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Hủy bỏ</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" id="edit-stock"><small class="ti-pencil-alt mr-2"></small>Update Stock</button>
      </div>
            </form>
  </div>
</div>
</div>
</div>
<style>
    .container-checkbox {

  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container-checkbox input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
      background-color: #f9f7f7;
    border: 1px solid cadetblue;
}

/* On mouse-over, add a grey background color */
.container-checkbox:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkbox input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-checkbox input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-checkbox .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
   .modal.fade{
    opacity:1;
  }
  .modal.fade .modal-dialog {
   -webkit-transform: translate(0);
   -moz-transform: translate(0);
   transform: translate(0);
 }
 #addcolor .modal-dialog {
  right: 0px;
  position: absolute;
  max-width: 100%;
}
#addsize .modal-dialog {
  min-width: 770px;
  /* width: 670px; */
  position: absolute;
  right: 0px;
}
#addsize .modal-dialog .form-inline input{
  margin-left: 10px;
}
#addcolor #color-error
{
  position: absolute;
  font-size: 12px;
  color:red;
  bottom: -6px;
  left: 18px;
}
#addcolor #bgc-error
{
  position: absolute;
  font-size: 12px;
  color:red;
  bottom: -30px;
  left: 18px;
}
#addsize .modal-dialog .form-group .error{
  position: absolute;
  top: 101px;
  display: block;
  width: 150px;
  font-size: 14px;
  color:red;
}
select[name="table-product_length"]{
  color: black;
}
</style>
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js "></script>

<script >
  $(document).ready( function () {
  $('#table-product').DataTable({
            dom: 'Bfrtip',
            buttons: [
             'excel', 'pdf'
            ]
        } );
} );
</script>

<script>
    $('#addsizemodal').on('hide.bs.modal', function (e) {
        $("input.checkonemodel").prop('checked', false);
    $('#addsizemodal .modal-dialog').attr('class', 'modal-dialog  bounceOutRight  animated');

  });
  $(document).on('click', '.btn-all', function() {
    let action = $(this).data('action');
    if (action == 'checkall') {
      $("input.checkonemodel").prop('checked', true);
    }
  });
  $(document).on('click', '.btn-delall', function() {
    let action = $(this).data('action');
    if (action == 'nonecheckall') {
      $("input.checkonemodel").prop('checked', false);
    }
  });
	$(document).on('click', 'input[type="checkbox"]', function() {
	let action = $(this).data('action');
	if (action == 'checkall') {
	if ($(this).is(":checked") == true) {
	$("input.checkone").prop('checked', true);
	} else {
	$("input.checkone").prop('checked', false);
	}
	}
	var chkLength = $("input.checkone").length;
	var chkCheckLength = $("input.checkone:checked").length;
	if (chkLength == chkCheckLength) {
	$("#checkbox1").prop('checked', true);
	} else {
	$("#checkbox1").prop('checked', false);
	}
	$("#btn-del-all > span").html(chkCheckLength);
	if (chkCheckLength > 0) {
	$("#btn-del-all").fadeIn(300);
	} else {
	$("#btn-del-all").hide();
	}
	});
      /*Delete Product*/
  $(document).on("click",".btn-del-pro",function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 sản phẩm</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
          url: '{{ url('admin/product/delete-pro') }}',
          type: 'POST',
          data: {id: id},
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
                $("#dd-item-"+id).remove();
                if ($("#table-product .tr").length == 0) {location.reload();}
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
    /*Open modal size*/
  $(document).on("click", ".btn-size", function() {
    let id = $(this).attr('data-id');
    $.ajax({
      url: '{{url("admin/product/modal-size")}}',
      type: 'POST',
      data: {id: id},
      dataType: 'JSON',
      headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
      },
      success:function(data) {
        //console.log(data);
        $('#addsizemodal [data-ajax="edit"]').html(data.name+' - Màu: '+data.color);
        $('#addsizemodal .product_id').val(data.product_id);
        $('#addsizemodal .stock').val(data.stock);
        $('#addsizemodal .table-size').html(data.body);
        //$('#addsize').modal('show');
        $('#addsizemodal').on('show.bs.modal', function (e) {
         $('#addsizemodal .modal-dialog').attr('class', 'modal-dialog bounceInRight animated');
       });
        // $("#btn-save-color").prop("disabled", true);
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
    $("#btn-save-size").click(function() {
    if (($("input[name*='size']:checked").length)<=0) {
      alert("You must check at least 1 box");
    }
    else{
     let action = $("#id-add-size").attr('action');
     let method = $("#id-add-size").attr('method');
     let form = document.querySelector("#id-add-size");
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
      $(document).on('click', '#edit-stock', function() {
        //let form = $("#frm-edit-stock").serialize();
        let action = $("#frm-edit-stock").attr('action');
        let method = $("#frm-edit-stock").attr('method');
        let form = document.querySelector("#frm-edit-stock");
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

      });
            /*Delete Product*/
  $(document).on("click",".btn-del-size",function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 size</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
          url: '{{ url('admin/product/delete-size') }}',
          type: 'POST',
          data: {id: id},
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