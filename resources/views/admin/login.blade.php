<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <base href="{{ asset('') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css')}}">
{{--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
  <script src="{{ asset('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>DIVI</b>MART</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Hãy đăng nhập để tiếp tục</p>

    <form action="{{ url('admin/dang-nhap') }}" method="post" onsubmit="return false;" id="frm-login">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Hãy nhập email" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Hãy nhập password" data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu.">
       
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="btn-login">Đăng nhập</button>
        </div>
      </div>
    </form>
  </div>
</div>
<style>
  .error{
    font-size: 12px;
    color:red;
    padding: 5px 0px;
  }
</style>
    <script src="{{ asset('public/admin/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/notify.js')}}"></script>
    <script src="{{ asset('public/admin/js/loginajax.js')}}"></script>
</body>
</html>
