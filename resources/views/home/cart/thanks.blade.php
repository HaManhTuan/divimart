@extends('layouts.home.home_layout')
@section('content')
<style>
  .loader-thanks {
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    background: url('{{ asset('public/frontend/img/loader.gif') }}') no-repeat center;
    margin: 0 auto;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  .thank{
    margin-top: 50px;
    margin-bottom: 150px;
  }
</style>
<div class="columns-container">
  <div class="container" id="columns">
    <div class="thank">
      <div class="col-md-12 wow fadeInLeft" data-wow-delay=".25s">
        <h3 align="center">ĐƠN HÀNG CỦA BẠN ĐANG ĐƯỢC XỬ LÝ</h3>
      </div>
      <div class="col-md-12 wow rollIn" data-wow-delay=".28s" style="margin:0 auto;">
        <div class="loader-thanks"></div>
      </div>
      <div class="col-md-12 wow rollIn" data-wow-delay=".28s" style="margin-bottom: 150px;">
        <h4 align="center">Cảm ơn bạn đã mua hàng tại siêu thị của chúng tôi.</h4>
      </div>
    </div>
  </div>
</div>
@endsection