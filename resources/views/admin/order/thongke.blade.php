@extends('layouts.admin.admin_layout')
@section('content')
<div class="content">
    <h2 class="page-title">Đơn hàng - <span class="fw-semi-bold">Sản phẩm</span>
    </h2>
    <div class="row">
        <div class="col-md-12">
			<section class="" style="text-align: center; margin-bottom: 20px;">
            <form id="frmSearch" method="post" action="" class="form-inline" onsubmit="return false;">
                @csrf
                <div class="form-group">
                    <label for="dateto" style="margin-right: 5px;">Từ</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control pull-right"  name="datefrom" value="">
                    </div>
                </div>
                <div class="form-group"  style="margin-left: 5px;">
                    <label for="dateto" style="margin-right: 5px;">đến</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control pull-right"  name="dateto" value="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2 filterDate">Tìm kiếm</button>
            </form>
           </section>
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Danh sách <span class="fw-semi-bold">đơn đặt hàng</span>
                    </h4>
                </div>
                <div class="box-body list-order">
                    <table id="orders-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thời gian</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Email</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
							</tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<script>

$(".filterDate").click(function(){
    $.ajax({
        url: '{{ url('admin/order/filterdate') }}',
        type: 'POST',
        dataType: 'JSON',
        data: $("#frmSearch").serialize(),
        success:function(data){
            //console.log(data);
            if (data.status =="_success") {
                $("#orders-table").hide();
                $(".box .list-order").html(data.data_table);
            }
        },
        error:function(err){
            console.log(err);
        }
    });
})	
</script>
@endsection