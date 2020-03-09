@extends('layouts.home.home_layout')
@section('content')
  <div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
    <div class="container">
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a>Liên hệ với chúng tôi</a>
      </div>
    </div>
  </div>
  	<section class="contact-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-6 contact-info">
					<h3>Liên lạc</h3>
					<p>{{ $dataConfig->address }}</p>
					<p>{{ $dataConfig->phone }}</p>
					<p>{{ $dataConfig->email }}</p>
					<div class="contact-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
				<div class="col-lg-6">
					<form class="contact-form" method="POST" action="{{ url('contact-post') }}" onsubmit="return false;" id="frm-contact">
						@csrf
						<input type="text" name="name" id="name" data-rule-required="true" data-msg-required="Vui lòng nhập tên." placeholder="Tên của bạn">

						<input type="email" name="email" id="email" data-rule-required="true" data-msg-required="Vui lòng nhập email." placeholder="Email của bạn">

						<input type="text" name="sub" id="sub"  data-rule-required="true" data-msg-required="Vui lòng nhập tiêu đề." placeholder="Tiêu đề">

						<textarea name="content" id="content" placeholder="Nội dung" data-rule-required="true" data-msg-required="Vui lòng nhập nội dung."></textarea>
						
						<button class="site-btn" style="display: block">Gửi</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<style>
		#frm-contact label.error{
			font-size: 12px;
			color:red;
			margin-left: 20px;
		}
	</style>
	<script>
		$('.site-btn').click(function() {
			$("#frm-contact").validate({
				submitHandler: function() {
					let action = $("#frm-contact").attr('action');
					let method = $("#frm-contact").attr('method');
					let form = $("#frm-contact").serialize();
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
								$.notify(data.msg,'success');
								$("#frm-contact")[0].reset();
								
							}
							else{
								$.notify(data.msg,'error');
								$("#frm-contact")[0].reset();
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