@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header">
                    <h4 class="pull-left">
                        Danh sách <span class="fw-semi-bold">bài viết</span>
                    </h4>
                    <button type="button" class="btn btn-success btn-xs pull-right" onclick='window.location.href="{{ url('admin/blog/add-blog') }}"'>
                        <i class="fa fa-plus"></i>
                        Thêm bài viết mới
                    </button>
                </div>
                <div class="box-body">
                  @if ($dataBlog->count() > 0)
                  <table id="blog-table" class="table table-bordered table-hover coupon">
                   <thead>
                     <tr>
                       <th>ID</th>
                       <th>Tên</th>
                       <th>Ảnh</th>
                       <th>Mô tả</th>
                       <th>#</th>
                       <th>Hành động</th>
                     </tr>
                   </thead>
                   <tbody>
                      @foreach ($dataBlog as $item)
                        <tr id="dd-item-{{ $item->id }}">
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td><img src="{{ asset('public/uploads/images/blogs/'.$item->img) }}" width="100"></td>
                          <td>{{ $item->description }}</td>
                          <td style="text-align: center">
                            @if ($item->status == 0)
                               <i class="fa fa-circle text-center text-danger mt-sm"></i>
                            @else
                            <i class="fa fa-circle text-center text-success mt-sm"></i>
                            @endif
                          </td>
                          <td>
                              <div>
                                <button type="button" class="btn btn-success btn-sm btn-edit-category" onclick='window.location.href="{{ url('admin/blog/edit-blog/'.$item->id) }}"'><span class="glyphicon glyphicon-pencil" style="margin-right: 5px;"></span>Sửa</button>

                                <button type="button" class="btn btn-danger btn-sm btn-del-pro"   data-id="{{ $item->id }}" ><span class="glyphicon glyphicon-trash" style="margin-right: 5px;"></span>Xóa</button>
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

<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script >
  $(document).ready( function () {
  $('#blog-table').DataTable();
} );
</script>
<script>
  $(document).on("click",".btn-del-pro",function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 bài viết</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
          url: '{{ url('admin/blog/delete') }}',
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
                if ($("#blog-table .tr").length == 0) {location.reload();}
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