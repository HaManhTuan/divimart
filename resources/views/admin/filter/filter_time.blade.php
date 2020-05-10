@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/buttons.dataTables.min.css') }}">
<style>
  table tbody tr:hover{
    background: #D8B2B2;
    cursor: pointer;
  }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Thống kê sản phẩm bán chạy tháng {{ $time }}
                    </h4>
                </div>
                <div class="box-body">
				         <div class="row" style="margin-top: 50px;">
				         	<div class="col-lg-12" >				         		
				         			<table class="table table-bordered" id="filter-table">
				         				<thead>
				         					<tr>
				         						<th>ID</th>
				         						<th>Tên sản phẩm</th>
                            <th>Size</th>
				         						<th>Số lượng bán</th>
                            <th>Tháng</th>
                           
				         					</tr>
				         				</thead>
				         				<tbody>
				         					@php
				         						$stt = 1;
				         					@endphp
				         					@foreach ($tuan as $value)
				         					@php
				         						$product_name = DB::table('products')->where('id',$value->product_id)->value('name');
                            $product_url = DB::table('products')->where('id',$value->product_id)->value('url');
        										$product_size = DB::table('product_size')->where('id',$value->size)->value('size');
				         					@endphp
				         						<tr onclick="window.location.href='{{ url('admin/product/edit-pro/'.$product_url) }}'">
				         							<td>{{ $stt++}}</td>
				         							<td>{{ $product_name}} </td>
                              <td>{{ $product_size }}</td>
				         							<td>{{ $value->count}}</td>
                              <td>Tháng {{ $time}}</td>
                              
				         						</tr>
				         					@endforeach
				         				</tbody>
				         			</table>
				         	
				         	</div>
				         </div>
		                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{  asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src="{{  asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}} "></script>
<script src="{{ asset('public/admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.print.min.js') }}"></script>
<script >
  $(document).ready( function () {
  $('#filter-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
             'excel'
            ]
        } );
} );
</script>
@endsection