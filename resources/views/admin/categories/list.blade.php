@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/plugins/iCheck/all.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/select2/dist/css/select2.min.css') }}">
 @php
$count_cate = DB::table('categories')->count();
@endphp
<section class="content-header">
  <h1>
    Quản lý danh mục sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Danh mục sản phẩm</li>
  </ol>
</section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

                    <button type="button" class="btn btn-success btn-xs pull-left" data-toggle="modal" data-target="#add-category-modal">
                    <i class="fa fa-plus"></i>
                        Thêm danh mục
                    </button>
                    <button class="btn btn-danger pull-right" style="display: none;padding-top: 5px;" id="btn-del-all" data-action="{{url("admin/category/delete")}}">
                        <i class="fas fa-trash-alt mr-2"></i>
                        Xóa <span></span> mục đã chọn?
                    </button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if ($count_cate == 0)
                    <h5 align="center">Danh mục sản phẩm đang trống.</h5>
                  @endif
                <table id="table-category" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkall" style="left: 0px !important;">
                                <input type="checkbox" class="minimal">
                                    <label for="checkbox1"></label>
                                </div>
                        </th>
                        <th>Id</th>
                        <th>Tên danh mục</th>
                        <th class="no-sort hidden-xs">Mô tả</th>
                        <th>Parent_id</th>
                        <th>Trạng thái</th>
                        <th class="hidden-xs">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                   @php
                   $stt=1;
                   @endphp
                   @foreach ($category_data as $category)
                    <tr id="dd-item-{{ $category->id }}" class="tr">
                            <td>
                                <div class="checkbox-list" style="left: 0px !important;">
                                    <input type="checkbox" class="minimal check" data-id="{{ $category->id }}">
                                    <label for="checkbox{{ $category->id }}"></label>
                                </div>
                            </td>
                        <th>{{ $stt++ }}</th>
                        <th>{{ $category->name }}</th>
                        <th>{{ $category->description }}</th>
                        <th>{{ $category->parent_id }}</th>
                        <th>
                            @if ($category->status == 1)
                                <span class="label label-danger">Online</span>
                            @endif
                            @if ($category->status == 0)
                                <span class="label bg-yellow">Away</span>
                            @endif
                        </th>
                        <th class="no-sort hidden-xs">
                            <button type="button" class="btn btn-success btn-sm btn-edit-category" data-placement="top" data-original-title=".btn .btn-success .btn-sm"  data-toggle="modal" data-target="#edit-category-modal"  data-id="{{ $category->id}}" data-action="{{ url('admin/category/edit-modal') }}">Sửa</button>
                            <button type="button" class="btn btn-danger btn-sm btn-del-cate" data-placement="top" data-original-title=".btn .btn-danger .btn-sm"  data-id="{{ $category->id }}" data-action="{{ url('admin/category/delete') }}">Xóa</button>
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

<!-- Modal thêm category -->
<div id="add-category-modal" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <form action="{{url('admin/category/add-category')}}" method="POST" id="addCategoryForm" onsubmit="return false;">
      @csrf
        <div class="modal-header">
            <h4 class="modal-title">Thêm danh mục mới</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="control-label">Chọn danh mục cha <font color="#a94442">(*)</font></label>
                <select class="form-control custom-select" name="parent_id" id="parent_id" data-rule-required="true" data-msg-required="Vui lòng chọn danh mục." >
                    <option value="" disabled="disabled" selected="selected">--- Chọn danh mục cha ---</option>
                    <option value="0">Không có</option>
                        {!! $data_select !!}

                </select>
            </div>
            <div class="form-group mb-3">
                <label for="category_name_input" class="control-label">Tên danh mục <font color="#a94442">(*)</font></label>
                <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug();" placeholder="Enter Name." data-rule-required="true" data-msg-required="Vui lòng nhập tên danh mục."/>

            </div>
             <div class="form-group mb-3">
                <label for="category_name_input" class="control-label">Url <font color="#a94442">(*)</font></label>
                <input type="text" class="form-control" id="url" name="url" readonly=""  />

            </div>
            <div class="form-group">
                <label class="control-label">Chi tiết danh mục</label>
                <textarea rows="5" cols="2" name="description" class="form-control"></textarea>
            </div>
			<div class="checkbox checkbox-primary">
                <input class="minimal" type="checkbox" checked="" value="1" name="status">
                <label for="checkbox2">
                    Hiển thị ngoài trang chính
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
            <button type="submit" class="btn btn-danger waves-effect waves-light btn-add-save"><small class="ti-save mr-2"></small>Lưu thay đổi</button>
        </div>
    </form>
</div>
</div>
</div>
<!-- Modals sửa category -->
<div id="edit-category-modal" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <form action="{{url('admin/category/edit')}}" method="post" id="editCategoryForm" role="form" onsubmit="return false;">
        <div class="modal-header">
            <h4 class="modal-title">Sửa danh mục &quot;
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
<script src="{{  asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{  asset('public/admin/js/slug.js')}}"></script>
<script src="{{  asset('public/admin/js/cate.js')}}"></script>
@endsection
