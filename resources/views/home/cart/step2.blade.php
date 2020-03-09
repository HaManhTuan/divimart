@extends('layouts.home.home_layout')
@section('content')
  <div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
    <div class="container">
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a>Thanh toán</a>
      </div>
    </div>
  </div>
  <section class="checkout">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12 mb-5">
        <form action="{{ url('cart/view-cart-final') }}" method="POST" id="frmstep3">
        @csrf

            <table class="table table-bordered">
                <thead>
                    <tr>
                       @if (Auth::guard('customers')->check())
                        <th>Thông tin tài khoản</th>
                        @endif
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
                           <textarea name="address_order" rows="3" class="form-control" id="address_order" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ." placeholder="Nhập địa chỉ"></textarea>
                        </div>
                         @if (Auth::guard('customers')->check())
                        <p>
                          <input type="checkbox" id="billtoship"> <label for="remember">Thông tin giống với thông tin tài khoản </label>
                        </p>
                        @endif
                    </td>
                    @else
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
                           <textarea name="address_order" rows="3" class="form-control" id="address_order" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ." placeholder="Nhập địa chỉ"></textarea>
                        </div>
                         @if (Auth::guard('customers')->check())
                        <p>
                          <input type="checkbox" id="billtoship"> <label for="remember">Thông tin giống với thông tin tài khoản </label>
                        </p>
                        @endif
                    </td>
                    @endif

                  </tr>
                </tbody>
            </table> 
    
          <div class="order-detail-content">
           <table class="table table-bordered">
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
                <button type="submit" class="next-btn" style="float: right;background:#2ecc71;color:#fff;border: 1px solid #2ecc71;padding: 10px 20px;">Thanh toán <i class="fa  fa-angle-right"></i></button>
        </div>
        </div>
      </div>
      </form>
    </div>
  </section>
  <script>
    jQuery(document).ready(function($) {
        $("#frmstep3").validate();
    });
  </script>
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
    
</script>
@endsection