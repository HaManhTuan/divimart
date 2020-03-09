

@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/dropify.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-switch.css')}}">
<div class="content container">
   <h2 class="page-title">Sửa sản phẩm <small></small></h2>
   <div class="row">
      <div class="col-md-12">
         <section class="box">
            <div class="box-header">
               <h4><i class="fa fa-user" style="margin-right: 5px;"></i>Sửa <small> sản phẩm</small></h4>
            </div>
            <div class="box-body">
               <form class="form-horizontal" id="editProductForm" method="POST" action="{{ url('admin/product/edit-pro/'.$product_detail->url) }}" enctype='multipart/form-data' onsubmit="return false;">
                  <fieldset>
                     <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                     <div class="form-group">
                        <label for="normal-field" class="col-sm-2 control-label">Tên sản phẩm:</label>
                        <div class="col-sm-7">
                           <input type="text" id="name_pro" name="name" class="form-control" placeholder="Hãy nhập tên sản phẩm" data-rule-required="true" data-msg-required="Vui lòng nhập tên sản phẩm."  onkeyup="ChangeToSlug();" value="{{ $product_detail->name }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Url
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="url_pro" name="url" class="form-control" readonly="" value="{{ $product_detail->url }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Danh mục sản phẩm
                        </label>
                        <div class="col-sm-7">
                           <select name="parent_id" id="parent_id" class="form-control" data-rule-required="true" data-msg-required="Vui lòng chọn danh mục." >
                              <option value="" disabled="disabled" selected="selected">--- Chọn danh mục ---</option>
                              {!! $data_select !!}
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Màu
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="color" name="color" class="form-control" data-rule-required="true" data-msg-required="Vui lòng chọn màu." placeholder="Hãy nhập màu" value="{{ $product_detail->color }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Số lượng
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="count" name="count" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập số lượng." placeholder="Hãy nhập số lượng" value="{{ $product_detail->count }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Giá
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="price" name="price" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập giá." placeholder="Hãy nhập giá" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')" value="{{ $product_detail->price }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="hint-field" class="col-sm-2 control-label">
                        Giá khuyến mại
                        </label>
                        <div class="col-sm-7">
                           <input type="text" id="promotional_price" name="promotional_price" class="form-control" data-rule-required="true" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')" value="{{ $product_detail->promotional_price }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" col-sm-2 control-label" for="hint-field">Mô tả sản phẩm:</label>
                        <div class="col-sm-10">
                           <textarea name="description" id="description" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả sản phẩm.">{!! $product_detail->description  !!}</textarea>
                           <script>CKEDITOR.replace('description','', 'full')</script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" col-sm-2 control-label" for="hint-field">Chi tiết sản phẩm:</label>
                        <div class="col-sm-10">
                           <textarea name="content" id="content" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả sản phẩm.">{!! $product_detail->content  !!}</textarea>
                           <script>CKEDITOR.replace('content','', 'full')</script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" col-sm-2 control-label" for="hint-field">Thông tin sản phẩm:</label>
                        <div class="col-sm-10">
                           <textarea name="infor" id="infor" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập mô tả sản phẩm.">{!! $product_detail->infor  !!}</textarea>
                           <script>CKEDITOR.replace('infor','', 'full')</script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Ảnh đại diện sản phẩm:</label>
                        <div class="col-sm-10">
                           <input type="file" name="file" id="file" class="dropify" accept="image/*" data-show-loader="true"  data-default-file="{{ asset('public/uploads/images/products/'.$product_detail->image) }}"/>
                           <input type="hidden" name="old_file" value="{{ $product_detail->image }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Trạng thái:</label>
                        <div class="col-sm-7">
                           <input type="checkbox" {{ ($product_detail->status == '1') ? 'checked' : '' }} data-on-color="success" data-off-color="warning" id="status" name="status">
                        </div>
                     </div>
                  </fieldset>
                  <div class="form-actions">
                     <div class="row">
                        <div class="col-sm-offset-3 col-sm-7" style="margin-left: 15%; ">
                           <div class="btn-toolbar">
                              <button type="submit" class="btn btn-primary" id="btn-save" data-redirect="{{ url('admin/product/view-product') }}">Sửa</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </section>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4><i class="fa fa-user" style="margin-right: 5px;"></i>Sửa <small>size sản phẩm</small></h4>
            </div>
             <div class="box-body">
               <form action="{{ url('admin/product/edit-stock') }}" method="post" id="frm-edit-stock" class="form-horizontal add-size" role="form" onsubmit="return false;" enctype='multipart/form-data' style="width: 500px; margin: 0 auto;">
                     {!! $table_size !!}
                 <button type="submit" class="btn btn-info waves-effect waves-light" id="edit-stock"><small class="ti-pencil-alt mr-2"></small>Cập nhật Size</button>
               </form>
             </div>
          </div>
      </div>
   </div>
</div>
<script src="{{ asset('public/admin/js/function.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('public/admin/js/dropify.js') }}"></script>
<script src="{{ asset('public/admin/js/pro-edit.js') }}"></script>
@endsection

