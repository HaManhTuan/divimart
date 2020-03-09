@extends('layouts.home.home_layout')
@section('content')
	<div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
		<div class="container">
			<h4>Đăng nhập</h4>
			<div class="site-pagination">
				<a href="{{ url('/') }}">Trang chủ</a> /
				<a>Đăng nhập</a>
			</div>
		</div>
	</div>
	<section class="register-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<div class="wow fadeInLeft" data-wow-delay=".25s" style="border: 1px solid beige;">
					<div class="field-note field-note-login">Nếu bạn đã có tài khoản hãy đăng nhập cùng với email của bạn.</div>
					<form action="{{ url('/login') }}" method="POST" class="frm-login" id="frm-login">
						@csrf
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control" id="email" name="email_login" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mật khẩu</label>
							<input type="password" class="form-control" name="password_login" id="password" data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu.">
						</div>
						<button type="submit" class="btn btn-primary btn-login" style="background:#2ecc71;border:#2ecc71;">Đăng nhập</button>
					</form>
				</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</section>
	<script>
		$('.btn-login').click(function() {
			$("#frm-login").validate({
				submitHandler: function() {
					let action = $("#frm-login").attr('action');
					let method = $("#frm-login").attr('method');
					let form = $("#frm-login").serialize();
					$.ajax({
						url: action,
						type: method,
						data: form,
						headers: {
							'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
						},
						dataType: 'JSON',
						success: function(data) {
							console.log(data);
							if (data.status == '_success') {
								$('.field-note-login').notify(data.msg,'success');
								$("#frm-login")[0].reset();
								setTimeout(function(){ window.location.href="{{ url('/') }}"; }, 1000);
							}
							else{
								$('.field-note-login').notify(data.msg,'error');
								$("#frm-login")[0].reset();
							}

						},
						error: function(err) {
							console.log(err);
						}
					});
				}
			})
		});
	</script>
@endsection