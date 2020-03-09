@extends('layouts.home.home_layout')
@section('content')
	<div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
		<div class="container">
			<h4>Đăng kí</h4>
			<div class="site-pagination">
				<a href="{{ url('/') }}">Trang chủ</a> /
				<a>Đăng kí</a>
			</div>
		</div>
	</div>
	<section class="register-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="frm-login">
						<form action="{{ url('/register') }}" method="POST" id="frm-register">
							@csrf
							<div class="form-group wow fadeInLeft" data-wow-delay=".25s">
								<label for="exampleInputEmail1">Tên</label>
								<input type="text" class="form-control" id="name" name="name" data-rule-required="true" data-msg-required="Vui lòng nhập tên.">
							</div>
							<div class="form-group wow fadeInRight" data-wow-delay=".25s">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control email-re" id="email" name="email" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
							</div>
							<div class="form-group wow fadeInLeft" data-wow-delay=".25s">
								<label for="exampleInputEmail1">Số điện thoại</label>
								<input type="number" class="form-control" id="phone" name="phone" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại.">
							</div>
							<div class="form-group wow fadeInRight" data-wow-delay=".25s">
								<label for="exampleInputEmail1">Địa chỉ</label>
								<textarea  class="form-control" id="address" name="address" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ."></textarea>
							</div>
							<div class="form-group wow fadeInLeft" data-wow-delay=".25s">
								<label for="exampleInputPassword1">Mật khẩu</label>
								<input type="password" class="form-control" id="password" name="password" data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu.">
							</div>
							<button type="submit" class="btn btn-primary wow fadeInUp" data-wow-delay=".25s" id="btn-register">Đăng Kí</button>
						</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
	    </div>
	</section>
	<script>
		jQuery(document).ready(function($) {

		$('#btn-register').click(function() {
			$("#frm-register").validate({
				submitHandler: function() {
					let action = $("#frm-register").attr('action');
					let method = $("#frm-register").attr('method');
					let form = $("#frm-register").serialize();
					$.ajax({
						url: action,
						type: method,
						data: form,
						headers: {
							'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
						},
						dataType: 'JSON',
						success: function(data) {
							//console.log(data);
							if (data.status == '_success') {
								$.notify(data.msg,'success');
								$("#frm-register")[0].reset();
								setTimeout(function(){ window.location.href="{{ url('loginfrm') }}"; }, 2000);
							}
							else{
								$('.email-re').notify(data.msg,'error');
								$(".email-re").val('');
							}
						},
						error: function(err) {
							//console.log(err);
						}
					});
				}
			})
		});
		});
	</script>
@endsection