@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/dropify.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-switch.css')}}">
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
.container-checkbox input.checkonemodel {
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
  left: -5px;
  height: 20px;
  width: 20px;
  background-color: #eee;
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
</style>
<div class="content container">
   <h2 class="page-title">Thêm mới sản phẩm <small></small></h2>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
               <h4><i class="fa fa-user" style="margin-right: 5px;"></i>Thêm <small> sản phẩm</small></h4>
            </div>
            <div class="box-body">
               <form class="form-horizontal" id="addProductForm" method="POST" action="{{ url('admin/product/add-pro') }}" enctype='multipart/form-data' onsubmit="return false;">
                  <fieldset>
                     <div class="form-group">
                        <label for="normal-field" class="col-sm-2 control-label">Tên sản phẩm:</label>
                        <div class="col-sm-7">
                           <input type="text" id="name_pro" name="name" class="form-control" placeholder="Hãy nhập tên sản phẩm" data-rule-required="true" data-msg-required="Vui lòng nhập tên sản phẩm."  onkeyup="ChangeToSlug();">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Url
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="url_pro" name="url" class="form-control" readonly="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Danh mục sản phẩm
                        </label>
                        <div class="col-sm-7">
                           <select name="parent_id" id="parent_id" class="form-control" data-rule-required="true" data-msg-required="Vui lòng chọn danh mục." >
                              <option value="" disabled="disabled" selected="selected">--- Chọn danh mục ---</option>
                              {!! $categoryData !!}
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Màu
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="color" name="color" class="form-control" data-rule-required="true" data-msg-required="Vui lòng chọn màu." placeholder="Hãy nhập màu">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Giá
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="price" name="price" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập giá." placeholder="Hãy nhập giá" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Giá khuyến mại
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="promotional_price" name="promotional_price" class="form-control" data-rule-required="true" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')" value="0">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" col-sm-2 control-label" for="hint-field">Mô tả sản phẩm:</label>
                        <div class="col-sm-9">
                           <textarea name="description" id="description" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả sản phẩm."></textarea>
                           <script>CKEDITOR.replace('description','', 'full')</script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" col-sm-2 control-label" for="hint-field">Chi tiết sản phẩm:</label>
                        <div class="col-sm-9">
                           <textarea name="content" id="content" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả sản phẩm."></textarea>
                           <script>CKEDITOR.replace('content','', 'full')</script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" col-sm-2 control-label" for="hint-field">Thông tin sản phẩm:</label>
                        <div class="col-sm-9">
                           <textarea name="infor" id="infor" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả sản phẩm."></textarea>
                           <script>CKEDITOR.replace('infor','', 'full')</script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Ảnh đại diện sản phẩm:</label>
                        <div class="col-sm-9">
                           <input type="file" name="file" id="file" class="dropify" accept="image/*" data-show-loader="true" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Trạng thái:</label>
                        <div class="col-sm-7">
                           <input type="checkbox" checked data-on-color="success" data-off-color="warning" id="status" name="status" data-on-text="Hiện" data-off-text="Ẩn">
                        </div>
                     </div>
                      <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Số lượng
                        </label>
                        <div class="col-sm-4">
                           <input type="number" id="count" name="count" class="form-control" placeholder="Hãy nhập số lượng" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Nhập Size:</label>
                        <div class="col-sm-9">
                           <div class="box box-warning box-solid">
                              <div class="box-header with-border">
                                <h3 class="box-title">Size</h3>
                                <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                  </button>
                                </div>
                                <!-- /.box-tools -->
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body" style="">
                                    <a class="btn-all btn btn-success" data-action="checkall" id="checkboxmodal"><i class="glyphicon glyphicon-plus" style="color:white;margin-right: 5px;"></i>Chọn hết</a> |
                                    <a class="btn-delall btn btn-danger" data-action="nonecheckall" id="checkboxnonemodal"><i class="glyphicon glyphicon-trash" style="color:white;margin-right: 5px;"></i>Xóa hết</a> |
                                    <button type="button" class="btn btn-info waves-effect waves-light" id="btn-save-size"><small class="ti-pencil-alt mr-2"></small>Add Size</button>
                                    <div style="margin-top: 30px;">
                                      @foreach($size as $size)
                                        <div class="checkbox form-inline">
                                        <label class="container-checkbox" style="margin-left: 10px;">{{ $size->size }}
                                          <input type="checkbox" class="checkonemodel" name="size[]" id="size" value="{{ $size->id }}" data-id="{{ $size->id }}">
                                          <span class="checkmark"></span>
                                        </label>
                                         <input type="text" name="stock[]" value="" class="form-control stock" style="display: none;" placeholder="">
                                        </div>
                                      @endforeach
                                    </div>
                              </div>
                            </div>
                        </div>
                      </div>
                  </fieldset>
                  <div class="form-actions">
                     <div class="row">
                        <div class="col-sm-offset-2 col-sm-7">
                           <div class="btn-toolbar">
                              <button type="submit" class="btn btn-primary" id="btn-save">Thêm mới</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="{{ asset('public/admin/js/function.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('public/admin/js/dropify.js') }}"></script>
<script src="{{ asset('public/admin/js/pro.js') }}"></script>
<script>
  $(document).on('click', '.btn-all', function() {
    let action = $(this).data('action');
    if (action == 'checkall') {
      $("input.checkonemodel").prop('checked', true);
      $('.stock').toggle();
    }
  });
  $(document).on('click', '.btn-delall', function() {
    let action = $(this).data('action');
    if (action == 'nonecheckall') {
      $("input.checkonemodel").prop('checked', false);
      $('.stock').toggle();
    }
  });
  $('#count').on("change",function(){
    let count = $(this).val();
    $('.checkbox .stock').val(count);
  });
  $('.checkbox input:checkbox').on('click', function(){
    $(this).closest('.checkbox').find('.stock').toggle();
  })


</script>
@endsection

