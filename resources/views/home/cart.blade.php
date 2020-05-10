@extends('layouts.home.home_layout')
@section('content')
<style>
    .cart-table .quantity .pro-qty .qtybtn{
        display: none;
    }
    .pro-qty{
        text-align: center;
    }
    .quantity .pro-qty input{
        float: none;
    }
</style>
  <div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
    <div class="container">
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a>Giỏ hàng của bạn</a>
      </div>
    </div>
  </div>
   @if ($cart_data->count() > 0)
      @if (!Auth::guard('customers')->check())
              <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <h5>Nếu bạn có mã giảm giá. Hãy <a href="{{ url('loginfrm') }}">đăng nhập</a> để đưởng hưởng khuyến mại</h5>
                </div>
            </div>
        </div>
      @endif
    <section class="cart-section mb-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table">
                        <h6>Giỏ hàng của bạn có: <span>{{ $cart_data->count() }} sản phẩm</span></h6>
                        <div class="cart-table-warp">
                            <table>
                            <thead>
                                <tr>
                                    <th class="product-th">Sản phẩm</th>
                                    <th class="quy-th">Số lượng</th>
                                    <th class="size-th">Size</th>
                                    <th class="total-th">Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                        @php $total_amount = 0; @endphp
                        @foreach ($cart_data as  $key => $cart)
                                <tr>
                                    <td class="product-col">
                                        <img src="{{ asset('public/uploads/images/products/'.$cart->attributes->avatar) }}" alt="">
                                        <div class="pc-title">
                                            <h4><a href="{{ url('chi-tiet/'.$cart->attributes->url) }}"></a>{{ $cart->name }}</h4>
                                            <p>{{ number_format($cart->price) }}</p>
                                        </div>
                                    </td>
                                    <td class="quy-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" id="qty" value="{{ $cart->quantity }}" onchange="updateCart('{{ $cart->id}}','{{ $cart->attributes->size }}','{{ $cart->attributes->product_id }}',this.value)">
                                            </div>
                                        </div>
                                    </td>
                                @php
                                   $size = DB::table('product_size')->where('id',$cart->attributes->size)->value('size');
                                @endphp
                                    <td class="size-col"><h4>Size {{ $size }}</h4></td>
                                    <td class="total-col"><h4>{{ number_format($cart->price*$cart->quantity )}}</h4>
                                    <span class="text-danger removeCart"  data-id="{{ $cart->id }}"><i class="fa fa-trash"></i></span>
                                    </td>
                                </tr>
                                 <?php $total_amount = $total_amount+($cart->quantity*$cart->price);?>
                        @endforeach
                            </tbody>
                        </table>
                        </div>
                        @if(!empty(Session::get('CouponAmount')))
                        <div class="total-cost">
                            <h6>Tổng tiền <span>{{ number_format($total_amount)}}</span></h6>
                        </div>
                        <div class="total-cost">
                            <h6>Giảm giá <span>- {{ number_format(Session::get('CouponAmount'))}}</span></h6>
                        </div>
                        <div class="total-cost">
                            <h6>Thành tiền <span>{{ number_format($total_amount  - Session::get('CouponAmount'))}}</span></h6>
                        </div>
                        @else
                        <div class="total-cost">
                            <h6>Tổng tiền <span>{{ number_format($total_amount)}}</span></h6>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 card-right">
                    @if (Auth::guard('customers')->check())
                    @if ($couponCus !='')
                    <form class="promo-code-form" action="{{ url('cart/coupon-cart') }}" method="POST" id="frmcoupon" onsubmit="return false;">@csrf
                        <select name="coupon_code" class="form-control" id="coupon_code" data-rule-required="true" data-msg-required="Vui lòng nhập mã giảm giá." style="width: 70%">
                            <option disabled="" selected="">--Chọn mã giảm giá--</option>
                            <option value="{{ Auth::guard('customers')->user()->coupon }}">{{ Auth::guard('customers')->user()->coupon }}</option>
                        </select>
                        <button type="submit" class=" mb-2" id="apply_coupon">Gửi</button>
                    </form>
                    @endif
                    @endif
                    <a href="{{ url('cart/view-cart-step-2') }}" class="site-btn">Thanh toán</a>
                    <a href="{{ url('/') }}" class="site-btn sb-dark">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </section>
  @else
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <h5>Giỏ hàng của bạn đang trống</h5>
                </div>
            </div>
        </div>
  @endif


<script>
    function updateCart(id,size,product_id,qty){

      $.get(
         "{{ url('cart/updateCart')  }}",
         {id:id,qty:qty,size:size,product_id:product_id},
         function(data){
            console.log(data);
            if (data.status == '_success') {
                $.notify(data.msg,'success');
                location.reload();
            }
            else{
                 $.notify(data.msg,'error');
                setTimeout(function(){ location.reload(); }, 2000);     
            }
        }
        );
     }
    $(".removeCart").click(function(){
    	let id = $(this).data('id');
    	$.ajax({
    		url: "{{ url('cart/removeCart') }}",
    		type: "POST",
    		data: {id: id},
    		  headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
    		success: function(data){
    			$.notify('Cập nhật thành công','success');
    			location.reload();
    		},
    		error:function(err) {
                console.log(err);
            }
    	});
    	
    });
                $("#apply_coupon").click(function() {
                    $("#frmcoupon").validate({
                        submitHandler: function() {
                            let action = $("#frmcoupon").attr('action');
                            let method = $("#frmcoupon").attr('method');
                            let coupon_code = $("#coupon_code").val();
                            $.ajax({
                                url: action,
                                type: method,
                                data: {coupon_code: coupon_code},
                                headers: {
                                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                                },
                                dataType: 'JSON',
                                success: function(data) {
                                    console.log(data);
                                    if(data.status=="_success"){
                                        $("#frmcoupon")[0].reset();
                                        $('#coupon_code').notify(data.msg,"success");
                                        setTimeout(function(){ location.reload(); }, 2000);
                                    }
                                    else{
                                        $("#frmcoupon")[0].reset();
                                        $('#coupon_code').notify(data.msg,"error");
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