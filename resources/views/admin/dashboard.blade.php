@extends('layouts.admin.admin_layout')
@section('content')
<style>
    table tr:hover{
        cursor: pointer;
    }
</style>
<?php
$current_month = date('M');
$last_month = date('M',strtotime("-1 month"));
$last_to_last_month = date('M',strtotime("-2 month"));
$current_day = date('d/M');
$yesterday_day = date('d/M',strtotime("-1 day"));
$yesterday_day_2 = date('d/M',strtotime("-2 day"));
$yesterday_day_3 = date('d/M',strtotime("-3 day"));
$yesterday_day_4 = date('d/M',strtotime("-4 day"));
$yesterday_day_5 = date('d/M',strtotime("-5 day"));
$yesterday_day_6 = date('d/M',strtotime("-6 day"));
 //print_r($yesterday_day);
//die();
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản trị
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Quản trị</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-lg-12">
           @if ($proExp->count() > 0)
          <div class="alert alert-danger alert-dismissible bounceInDown animated">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Thông báo sản phẩm sắp hết hàng!</h4>
            @foreach($proExp as $value)
                <span class="key">{{ $value->product->name }} - Size:{{ $value->size->size }} - Còn lại: <span>{{ $value->stock }} </span> sản phẩm </span><br>
            @endforeach
            <div class="redirect-pro">
                <a href="{{ url('admin/product/view-product') }}"><i class="fa fa-undo"></i> Chuyển đến trang quản lý sản phẩm</a>
            </div>
          </div>
           @endif
        </div>
      </div>
     <div class="row">
       <div class="col-lg-8">
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Đơn hàng cần xử lý</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đơn hàng đang chuyển</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  @if ($ordersNews->count() > 0)
                    <h5 class="tab-header"><i class="fa fa-star"></i> Danh sách đơn hàng - <a href="{{ url('admin/order/view-order') }}">Chi tiết</a></h5>
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>SĐT</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordersNews as $item)
                            <tr class='clickable-row' data-href='{{ url('admin/order/view-orderdetail/'.$item->id) }}'>
                           
                                <td>{{ $item->created_at  }}</td>
                                <td>{{ $item->name  }}</td>
                                <td>{{ $item->phone  }}</td>
                                <td>
                                     @foreach($item->orders as $value)
                                    {{ $value->product_name }} -
                                    @php
                                    $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                    @endphp
                                    Size: {{ $size }}-({{ $value->quantity }})<br>
                                    @endforeach
                                </td>
                                <td>{{ number_format($item->coupon_price) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                  <h5 align="center">Không có đơn hàng nào mới</h5>
                  @endif
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @if ($ordersTrans->count() > 0)
                <h5 class="tab-header"><i class="fa fa-star"></i> Danh sách đơn hàng - <a href="{{ url('admin/order/view-order') }}">Chi tiết</a></h5>
                <table class="table-bordered table-hover table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($ordersTrans as $item)
                                <tr class='clickable-row' data-href='{{ url('admin/order/view-orderdetail/'.$item->id) }}'>
                               
                                    <td>{{ $item->created_at  }}</td>
                                    <td>{{ $item->name  }}</td>
                                    <td>{{ $item->phone  }}</td>
                                    <td>
                                         @foreach($item->orders as $value)
                                        {{ $value->product_name }} -
                                        @php
                                        $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                        @endphp
                                        Size: {{ $size }}-({{ $value->quantity }})<br>
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($item->total_price) }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                @else
                <h5 align="center">Không có đơn hàng nào đang chuyển</h5>
                @endif
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
       </div>
       <div class="col-lg-4">
         <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Doanh thu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <ul class="overall-stats">
                  <li>
                    <div class="icon pull-left">
                        <i class="fa fa-shopping-cart" style="color: red"></i>
                    </div>
                    <span class="key">Tổng doanh thu hôm nay</span>
                    <div class="value pull-right">
                        <span style="font-weight: bold;">{{ number_format($revenueOrderToday)  }}</span>
                    </div>
                  </li>
                  <li>
                    <div class="icon pull-left">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <span class="key">Tổng doanh thu hôm qua</span>
                    <div class="value pull-right">
                        <span style="font-weight: bold;">{{ number_format($revenueOrderYesterday)  }}</span>
                    </div>
                  </li>
                  <li>
                    <div class="icon pull-left">
                        <i class="fa fa-shopping-cart" style="color: green;"></i>
                    </div>
                    <span class="key">Tổng doanh thu</span>
                    <div class="value pull-right">
                        <span style="font-weight: bold;">{{ number_format($revenueOrder)  }}</span>
                    </div>
                  </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
       </div>
     </div>
    <div class="row">
       <div class="col-lg-8">
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_11" data-toggle="tab" aria-expanded="true">Đơn hàng mới hôm nay</a></li>
              <li class=""><a href="#tab_22" data-toggle="tab" aria-expanded="false">Đơn hàng đang chuyển hôm nay</a></li>
              <li class=""><a href="#tab_33" data-toggle="tab" aria-expanded="false">Đơn hàng đã chuyển hôm nay</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_11">
                  @if ($dataOrderNewToday->count() > 0)
                    <h5 class="tab-header"><i class="fa fa-star"></i> Danh sách đơn hàng - <a href="{{ url('admin/order/view-order') }}">Chi tiết</a></h5>
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>SĐT</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataOrderNewToday as $item)
                            <tr class='clickable-row' data-href='{{ url('admin/order/view-orderdetail/'.$item->id) }}'>
                                <td>{{ $item->created_at  }}</td>
                                <td>{{ $item->name  }}</td>
                                <td>{{ $item->phone  }}</td>
                                <td>
                                     @foreach($item->orders as $value)
                                    {{ $value->product_name }} -
                                    @php
                                    $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                    @endphp
                                    Size: {{ $size }}-({{ $value->quantity }})<br>
                                    @endforeach
                                </td>
                                <td>{{ number_format($item->coupon_price) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                  <h5 align="center">Không có đơn hàng nào mới</h5>
                  @endif
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_22">
                @if ($dataOrderTransToday->count() > 0)
                <h5 class="tab-header"><i class="fa fa-star"></i> Danh sách đơn hàng - <a href="{{ url('admin/order/view-order') }}">Chi tiết</a></h5>
                <table class="table-bordered table-hover table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($dataOrderTransToday as $item)
                                <tr class='clickable-row' data-href='{{ url('admin/order/view-orderdetail/'.$item->id) }}'>
                               
                                    <td>{{ $item->created_at  }}</td>
                                    <td>{{ $item->name  }}</td>
                                    <td>{{ $item->phone  }}</td>
                                    <td>
                                         @foreach($item->orders as $value)
                                        {{ $value->product_name }} -
                                        @php
                                        $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                        @endphp
                                        Size: {{ $size }}-({{ $value->quantity }})<br>
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($item->total_price) }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                @else
                <h5 align="center">Không có đơn hàng nào đang chuyển</h5>
                @endif
              </div>
              <div class="tab-pane" id="tab_33">
                @if ($dataOrderSucessToday->count() > 0)
                <h5 class="tab-header"><i class="fa fa-star"></i> Danh sách đơn hàng - <a href="{{ url('admin/order/view-order') }}">Chi tiết</a></h5>
                <table class="table-bordered table-hover table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($dataOrderSucessToday as $item)
                                <tr class='clickable-row' data-href='{{ url('admin/order/view-orderdetail/'.$item->id) }}'>
                               
                                    <td>{{ $item->created_at  }}</td>
                                    <td>{{ $item->name  }}</td>
                                    <td>{{ $item->phone  }}</td>
                                    <td>
                                         @foreach($item->orders as $value)
                                        {{ $value->product_name }} -
                                        @php
                                        $size = DB::table('product_size')->where('id',$value->size)->value('size');
                                        @endphp
                                        Size: {{ $size }}-({{ $value->quantity }})<br>
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($item->total_price) }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                @else
                <h5 align="center">Không có đơn hàng nào đang chuyển</h5>
                @endif
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
       </div>
       <div class="col-lg-4">
         <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Đơn hàng hôm nay</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <ul class="overall-stats">
                  <li>
                      <div class="icon pull-left">
                          <i class="fa fa-fw fa-list-alt"></i>
                      </div>
                      <span class="key">Đơn hàng mới hôm nay</span>
                      <div class="value pull-right">
                          <span class="label bg-blue">{{ $countOrderNewToday  }}</span>
                      </div>
                  </li>
                  <li>
                      <div class="icon pull-left">
                          <i class="fa fa-fw fa-list-alt"></i>
                      </div>
                      <span class="key">Đơn hàng đang chuyển hôm nay</span>
                      <div class="value pull-right">
                          <span class="label bg-yellow">{{ $countOrderTransToday }}</span>
                      </div>
                  </li>
                  <li>
                      <div class="icon pull-left">
                          <i class="fa fa-fw fa-list-alt"></i>
                      </div>
                      <span class="key">Đơn hàng đã chuyển hôm nay</span>
                      <div class="value pull-right">
                          <span class="label bg-green">{{ $countOrderSucessToday }}</span>
                      </div>
                  </li>
                  <li>
                      <div class="icon pull-left">
                          <i class="fa fa-fw fa-list-alt"></i>
                      </div>
                      <span class="key">Số đơn hàng bị hủy hôm nay</span>
                      <div class="value pull-right">
                          <span class="label bg-red">{{ $countOrderCancellToday }}</span>
                      </div>
                  </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
       </div>
     </div>
         <div class="row">
        <div class="col-md-6">
            <section class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Thống kê đơn hàng tuần trước</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
                    <canvas id="myChartOrderWeek" width="400" height="200"></canvas>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Thống kê doanh thu tuần trước</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                <canvas id="myChartrevenueWeek" width="400" height="200"></canvas>
              </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <section class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Thống kê đơn hàng theo quý</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                    <canvas id="myChartOrderQuater" width="400" height="200"></canvas>
                </div>
            </section>
            
        </div>
        <div class="col-lg-6">
            <section class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Thống kê doanh thu theo quý</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                    <canvas id="myChartrevenueQuater" width="400" height="200"></canvas>
                </div>
            </section>
        </div>
    </div>
     <div class="row">
       <div class="col-lg-4">
          <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Sản phẩm bán chạy nhất</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Tên </th>
                              <th>Đã bán</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($promostBuy as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->name }}</td>
                          <td><button type="button" class="btn btn-info btn-xs">{{ $value->buy_count }}</button></td>
                        </tr> 
                        @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
      </div>
      <div class="col-lg-4">
          <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Sản phẩm xem nhiều nhất</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Tên </th>
                              <th>Đã bán</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($promostView as $item)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->name }}</td>
                          <td><button type="button" class="btn btn-info btn-xs">{{ $value->count_view }}</button></td>
                        </tr> 
                        @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
      </div>
      <div class="col-lg-4">
          <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Sản phẩm sắp hết hàng</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Tên </th>
                              <th>Số lượng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($proExp as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->product->name }}-Size:{{ $value->size->size }}</td>
                          <td><button type="button" class="btn btn-info btn-xs">{{ $value->stock }}</button></td>
                        </tr> 
                        @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
      </div>
     </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
    <style>
      .overall-stats{
        padding: 0px
      }
      .overall-stats li{
        list-style: none;
      }
      .overall-stats .key {
          line-height: 18px;
          margin-left: 5px;
      }
      .overall-stats .value {
          text-align: right;
      }

    </style>
    <script>
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
</script>
<script>
Chart.defaults.global.legend.display = false;
var ctx = document.getElementById('myChartOrderQuater');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['<?php echo $last_to_last_month ?>','<?php echo $last_month ?>', '<?php echo $current_month ?>' ],
        datasets: [{

            data: [<?php echo $last_to_last_month_order ?>, <?php echo $last_month_order ?>, <?php echo $current_month_order ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1,
            fontColor: '#FFFEFE'
        }]
    },
    options: {
        legend: {
            labels: {
                fontColor: "black",
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "black",
                    beginAtZero: true,
                    stepSize: 1
                }
            }],
            xAxes: [{
                ticks: {
                    fontColor: "black",
                    beginAtZero: true
                }
            }],
        }
    }
});
</script>
<script>
    Chart.defaults.global.legend.display = false;
    var ctx = document.getElementById('myChartrevenueQuater').getContext("2d");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['<?php echo $last_to_last_month ?>','<?php echo $last_month ?>', '<?php echo $current_month ?>' ],
            datasets: [{
                label: "Data",
                borderColor: "#80b6f4",
                pointBorderColor: "#80b6f4",
                pointBackgroundColor: "#80b6f4",
                pointHoverBackgroundColor: "#80b6f4",
                pointHoverBorderColor: "#80b6f4",
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 1,
                pointRadius: 3,
                fill: false,
                borderWidth: 4,
                data: [<?php echo $last_to_last_month_order_revenue ?>, <?php echo $last_month_order_revenue ?>, <?php echo $current_month_order_revenue ?>]
            }]
        },
        options: {
            legend: {
                position: "bottom"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "black",
                        //fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        stepSize: 100000,
                        callback: function(label, index, labels) {
                            return label/1000+'k';
                        }
                    },
                     scaleLabel: {
                        display: true,
                        labelString: '1k = 1000'
                    }
                    //gridLines: { color: "#e9ebf0" },

                }],
                xAxes: [{
                    //gridLines: { color: "#e9ebf0"},
                    ticks: {
                        fontColor: "black",
                        //fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });
</script>
<script>
Chart.defaults.global.legend.display = false;
    var ctx = document.getElementById('myChartOrderWeek').getContext("2d");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['<?php echo $yesterday_day_6 ?>','<?php echo $yesterday_day_5 ?>', '<?php echo $yesterday_day_4 ?>', '<?php echo $yesterday_day_3 ?>', '<?php echo $yesterday_day_2 ?>', '<?php echo $yesterday_day ?>', '<?php echo $current_day ?>' ],
            datasets: [{
                label: "Data",
                borderColor: "#80b6f4",
                pointBorderColor: "#80b6f4",
                pointBackgroundColor: "#80b6f4",
                pointHoverBackgroundColor: "#80b6f4",
                pointHoverBorderColor: "#80b6f4",
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 1,
                pointRadius: 3,
                fill: false,
                borderWidth: 4,
                data: [<?php echo $yesterday_day_6_order_week ?>, <?php echo $yesterday_day_5_order_week ?>, <?php echo $yesterday_day_4_order_week ?>, <?php echo $yesterday_day_3_order_week ?>, <?php echo $yesterday_day_2_order_week ?>, <?php echo $yesterday_day_order_week ?>, <?php echo $current_day_order_week ?> ]
            }]
        },
        options: {
            legend: {
                position: "bottom"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "black",
                        //fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        stepSize: 1,
                        // callback: function(label, index, labels) {
                        //     return label/1000+'k';
                        // }
                    }
                    //  scaleLabel: {
                    //     display: true,
                    //     labelString: '1k = 1000'
                    // }
                    //gridLines: { color: "#e9ebf0" },

                }],
                xAxes: [{
                    //gridLines: { color: "#e9ebf0"},
                    ticks: {
                        fontColor: "black",
                        //fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });
</script>
<script>
Chart.defaults.global.legend.display = false;
    var ctx = document.getElementById('myChartrevenueWeek').getContext("2d");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['<?php echo $yesterday_day_6 ?>','<?php echo $yesterday_day_5 ?>', '<?php echo $yesterday_day_4 ?>', '<?php echo $yesterday_day_3 ?>', '<?php echo $yesterday_day_2 ?>', '<?php echo $yesterday_day ?>', '<?php echo $current_day ?>' ],
            datasets: [{
                label: "Data",
                borderColor: "#80b6f4",
                pointBorderColor: "#80b6f4",
                pointBackgroundColor: "#80b6f4",
                pointHoverBackgroundColor: "#80b6f4",
                pointHoverBorderColor: "#80b6f4",
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 1,
                pointRadius: 3,
                fill: false,
                borderWidth: 4,
                data: [<?php echo $yesterday_day_6_order_revenue ?>, <?php echo $yesterday_day_5_order_revenue ?>, <?php echo $yesterday_day_4_order_revenue ?>, <?php echo $yesterday_day_3_order_revenue ?>, <?php echo $yesterday_day_2_order_revenue ?>, <?php echo $yesterday_day_order_revenue ?>, <?php echo $current_day_order_revenue ?> ]
            }]
        },
        options: {
            legend: {
                position: "bottom"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "black",
                        //fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        //stepSize: 100000,
                        callback: function(label, index, labels) {
                            return label/1000+'k';
                        }
                    },
                    //  scaleLabel: {
                    //     display: true,
                    //     labelString: '1k = 1000'
                    // },
                    gridLines: { color: "#e9ebf0" },

                }],
                xAxes: [{
                    //gridLines: { color: "#e9ebf0"},
                    ticks: {
                        fontColor: "black",
                        //fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });
</script>
@endsection