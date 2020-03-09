@extends('layouts.home.home_layout')
@section('content')
<style>
  .vertical-menu-list{
  display: none;
  }
  .products-block.best-sell li{
  padding: 5px;
  }
  .attribute-list .error{
    color: red;
    margin-left: 5px;
  }
</style>
<div class="columns-container">
	<div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ url('/') }}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Giỏ hàng của bạn</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->

        <!-- ../page heading-->
        <div class="page-content page-order">
            <ul class="step">
                <li><span>1. Giỏ hàng</span></li>
                <li><span>2. Đăng nhập</span></li>
                <li class="current-step"><span>3. Thanh toán</span></li>
            </ul>
            <div class="heading-counter warning">Vui lòng nhập thông tin chính xác
            </div>
            <div class="order-detail-content" >
              <form action="{{ url('cart/view-cart-final') }}" method="POST" id="frmstep3">
                @csrf
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th>Thông tin tài khoản</th>
                            <th>Thông tin hóa đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @if (Auth::guard('customers')->check())
                          <td>
                            <div class="form-group">
                               <input name="name_cus" value="{{ Auth::guard('customers')->user()->name}}" type="text" class="form-control" id="name_cus"   placeholder="Họ tên" data-rule-required="true" data-msg-required="Vui lòng nhập tên.">
                            </div>
                            <div class="form-group">
                               <input name="phone_cus" value="{{ Auth::guard('customers')->user()->phone}}" type="text" class="form-control"  id="phone_cus" placeholder="Số điện thoại" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại.">
                            </div>
                            <div class="form-group">
                               <input name="email_cus" value="{{ Auth::guard('customers')->user()->email}}" type="email" class="form-control" id="email_cus"   placeholder="Email" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
                            </div>
                            <div class="form-group">
                               <textarea name="address_cus" rows="3" class="form-control" id="address_cus" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ.">{{ Auth::guard('customers')->user()->address}}</textarea>
                            </div>
                            <p>
                             Thông tin tài khoản. Bạn có thể sửa 
                            </p>
                          </td>
                        @else
                          <td>
                             <button type="button" class="btn btn-danger" onclick='window.location.href=""'>Đăng nhập/Đăng kí</button>
                          </td>
                        @endif
                        <td>
                            <div class="form-group">
                               <input name="name_order" value="" type="text" class="form-control" id="name_order"   placeholder="Họ tên" data-rule-required="true" data-msg-required="Vui lòng nhập tên.">
                            </div>
                            <div class="form-group">
                               <input name="phone_order" value="" type="text" class="form-control"  id="phone_order" placeholder="Số điện thoại" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại.">
                            </div>
                            <div class="form-group">
                               <input name="email_order" value="" type="email" class="form-control" id="email_order"   placeholder="Email" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
                            </div>
                            <div class="form-group">
                               <textarea name="address_order" rows="3" class="form-control" id="address_order" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ."></textarea>
                            </div>
                            <p>
                              <input type="checkbox" id="billtoship"> <label for="remember">Thông tin giống với thông tin tài khoản </label>
                            </p>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="order-detail-content">
           <table class="table table-bordered table-responsive cart_summary">
              <thead>
                  <tr>
                      <th>Hình thức thanh toán</th>
                      <th>Lưu ý</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td>      
                    <div class="box-border">
                        <ul>
                            <li>
                                <label for="radio_button_5"><input type="radio" checked name="payment" id="radio_button_5" value="1"> Trả tiền mặt</label>
                            </li>
                        </ul>
                    </div>
                  </td>
                  <td>
                    <textarea name="note" id="note" class="form-control" rows="3"></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="cart_navigation">
          <button type="submit" class="next-btn" style="float: right;background:#ff3366;color:#fff;border: 1px solid#ff3366;padding: 10px 20px;">Thanh toán <i class="fa  fa-angle-right"></i></button>
        </div>
      </form>
    </div>
</div>
<script>
      $('#billtoship').click(function()
        {
          if (this.checked) {
            $('#name_order').val($('#name_cus').val());
            $('#phone_order').val($('#phone_cus').val());
            $('#email_order').val($('#email_cus').val());
            $('#address_order').val($('#address_cus').val());
          } 
          else
          {
            $('#name_order').val('');
            $('#phone_order').val('');
            $('#email_order').val('');
            $('#address_order').val('');
          }
        });
      $("#frmstep3").validate();
</script>
@endsection