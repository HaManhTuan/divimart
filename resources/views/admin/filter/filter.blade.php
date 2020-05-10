@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <section class="box">
                <div class="box-header" style="display: flex;justify-content: space-between;">
                    <h4>
                        Thông kê sản phẩm
                    </h4>
                </div>
                <div class="box-body">
                	<form action="" method="POST">
		                <div class="form-group">
				            <label for="normal-field" class="col-sm-2 control-label">Sản phẩm:</label>
				            <div class="col-sm-3">
								<select name="" class="form-control" id="cate">
									<option selected="" disabled="">--Chọn loại--</option>
									<option value="buy">Bán chạy nhất</option>
								</select>
				            </div>
				            <div class="col-sm-3">
											<select name="time" id="time" class="form-control" style="display: none;">
												<option selected="" disabled="">--Chọn tháng--</option>
												<option value="1">Tháng 1</option>
												<option value="2">Tháng 2</option>
												<option value="3">Tháng 3</option>
												<option value="4">Tháng 4</option>
												<option value="5">Tháng 5</option>
												<option value="6">Tháng 6</option>
												<option value="7">Tháng 7</option>
												<option value="8">Tháng 8</option>
												<option value="9">Tháng 9</option>
												<option value="10">Tháng 10</option>
												<option value="11">Tháng 11</option>
												<option value="12">Tháng 12</option>
											</select>
				            </div>
				         </div>	
		                </form>
				         <div class="row" style="margin-top: 50px;">
				         	<div class="col-lg-12" >
				         		<div class="col-lg-6" id="bar" style="display: block;">
				         			<canvas id="myChartOrderQuater" width="400" height="200" style="margin-top: 50px;"></canvas>
				         		</div>	
				         		<div class="col-lg-6" id="list-pro"></div>	
				         	</div>
				         </div>
		                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('public/admin/js/Chart.js') }}"></script>
<script>
	jQuery(document).ready(function($) {
		
		$("#cate").on('change', function(event) {
			event.preventDefault();
			$("#time").show();
		});
		$("#time").on('change', function(event) {
			let time = $("#time").val();
			$.ajax({
				url: "{{ url('admin/thong-ke/filter') }}",
				type: "POST",
				data: {time: time},
				headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')},
	      dataType:'JSON',
				success: function(data){
				if (data.status =="_success") {
					$("#bar").show();
					$(".box #list-pro").html(data.data_table);
						Chart.defaults.global.legend.display = false;
						var ctx = document.getElementById('myChartOrderQuater');
						var myChart = new Chart(ctx, {
						    type: 'bar',
						    data: {
						        labels: data.stt,
						        datasets: [{

						            data: data.count,
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
				}
				// else{
				// 	$('#list-pro').append('<p>'+ data.msg +'</p>')
				// }
			
					
				},
				error: function(err){
					console.log(err);
				}
			});
		});

	});
</script>
@endsection