@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Danh sách <span class="fw-semi-bold">liên hệ khách hàng</span>
                    </h4>
                </div>
                <div class="box-body">
                  @if ($dataContact->count() > 0)
                  <table id="contact-table" class="table table-bordered table-hover coupon">
                   <thead>
                     <tr>
                       <th>ID</th>
                       <th>Tên</th>
                       <th>Email</th>
                       <th>Subject</th>
                       <th>Hành động</th>
                     </tr>
                   </thead>
                   <tbody>
                      @foreach ($dataContact as $item)
                        <tr id="dd-item-{{ $item->id }}">
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->subject }}</td>
                          <td>
                              <div>
                                <button type="button" class="btn btn-danger btn-sm btn-del-pro btn-edit-category"   data-id="{{ $item->id }}" data-toggle="modal" data-target="#edit-category-modal" data-action="{{ url('admin/contact/open-modal') }}"><span class="glyphicon glyphicon-view" style="margin-right: 5px;"></span>View</button>
                              </div>
                          </td>
                        </tr>
                      @endforeach
                   </tbody>
                 </table>
                 @endif
               </div>
             </section>
           </div>
         </div>
       </div>
        <div id="edit-category-modal" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="" method="post" id="editCategoryForm" role="form" onsubmit="return false;">
                        <div class="modal-header">
                            <h4 class="modal-title">Chi tiết &quot;
                                <span data-ajax="edit" data-field="html"></span>&quot;
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script>
  $(document).ready( function () {
    $('#contact-table').DataTable();
  });
</script>
@endsection