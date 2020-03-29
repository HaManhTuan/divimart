@extends('layouts.home.home_layout')
@section('content')
<style>
     .closebtn {
      margin-left: 15px;
      color: #155724;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }
</style>
  <div class="page-top-info" data-wow-delay=".25s">
    <div class="container">
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a href="{{ url('danh-muc/'.$productUrl->category->url) }}">{{ $productUrl->category->name }}</a>/
        <a>{{ $productUrl->name }}</a>
      </div>
    </div>
  </div>
  <section class="product-section">
    <div class="container">
{{--       <div class="row alert-cart" style="display: flex;justify-content: end">
        <div class="alert alert-success wow fadeInRight" data-wow-delay=".25s" role="alert">
           <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            This is a success alert—check it out!
        </div>
      </div> --}}
      <div class="back-link wow fadeInLeft" data-wow-delay=".25s">
        <a href="{{ url('danh-muc/'.$productUrl->category->url) }}"> &lt;&lt; Quay lại danh mục {{ $productUrl->category->name }} </a>
      </div>
      <div class="row">
        <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".25s">
          <div class="product-pic-zoom">
            <img class="product-big-img" src="{{ asset('public/uploads/images/products/'.$productUrl->image) }}" alt="">
          </div>
          <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
            <div class="product-thumbs-track">
              <div class="pt active" data-imgbigurl="{{ asset('public/uploads/images/products/'.$productUrl->image) }}"><img src="{{ asset('public/uploads/images/products/'.$productUrl->image) }}" alt=""></div>
              @foreach($product_img as $product_img)
              <div class="pt" data-imgbigurl="{{ asset('public/uploads/images/products/'.$product_img->img) }}"><img src="{{ asset('public/uploads/images/products/'.$product_img->img) }}" alt=""></div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-6 product-details wow fadeInDown" data-wow-delay=".25s">
          <form id="addtoCart" method="POST" action="{{ url('cart/add-to-cart') }}" enctype='multipart/form-data' onsubmit="return false;">
                @csrf
              <input type="hidden" name="product_name" id="product_name" value="{{ $productUrl->name }}">
              @if($productUrl->promotional_price != 0)
              <input type="hidden" name="price" id="price" value="{{ $productUrl->promotional_price }}">
              @endif
              @if($productUrl->promotional_price == 0)
              <input type="hidden" name="price" id="price" value="{{ $productUrl->price }}">
              @endif
              <input type="hidden" name="product_id" id="product_id" value="{{ $productUrl->id }}">
              <input type="hidden" name="avatar" id="avatar" value="{{ $productUrl->image }}">
              <input type="hidden" name="url" id="url" value="{{ $productUrl->url }}">
          <h2 class="p-title">{{ $productUrl->name }}</h2>

                @if ( $productUrl->promotional_price > 0)
                <div class="price-pro">
                <h3>{{ number_format($productUrl->promotional_price) }}</h3>
                <h3 class="old-price" style="margin-left: 2px;">{{ number_format($productUrl->price) }}</h3>
                <h3 class="old-price " style="margin-left: 1px;">-{{ $productUrl->sale }}%</h3>
                </div>
                @endif
                @if ( $productUrl->promotional_price == 0)
                  <h3 class="p-price">{{ number_format($productUrl->price) }}</h3>
                @endif
                  {!! $productUrl->description !!}
                @if ($countsizename > 0)
                <div class="fw-size-choose ">
                  <p>Size</p>
                   @foreach ($sizeData as $sizename)
                  <div class="sc-item {{ $sizename->stock == 0 ? 'disable':'' }} ">
                    <input type="radio" class="size" name="sc" id="{{ $sizename->size->size }}-size" value="{{ $sizename->size->id }}" {{ $sizename->stock == 0 ? 'disabled="disabled"':'' }}>
                    <label for="{{ $sizename->size->size }}-size">{{ $sizename->size->size }}</label>
                  </div>
                  @endforeach
                </div>
                <input type="hidden" id="ic-size" name="size" value="">
                @endif
                  <div class="quantity">
                    <p>Số lượng</p>
                    <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                  </div>
                   @if ($countsizename > 0)
                  <button type="submit" class="site-btn" id="addCart">Mua ngay</button>
                  @endif
            </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="accordion" class="accordion-area">
{{--                 <div class="panel">
                  <div class="panel-header" id="headingOne">
                    <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Mô tả sản phẩm</button>
                  </div>
                  <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="panel-body">
                      {!! $productUrl->description !!}
                    </div>
                  </div>
                </div> --}}
                <div class="panel active">
                  <div class="panel-header" id="headingTwo">
                    <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Chi tiết sản phẩm </button>
                  </div>
                  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="panel-body">
                     {!! $productUrl->content !!}
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-header" id="headingThree">
                    <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Thông tin</button>
                  </div>
                  <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="panel-body">
                      {!! $productUrl->infor !!}
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-header" id="headingThree">
                    <button class="panel-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Bình luận</button>
                  </div>
                  <div id="collapse4" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="panel-body">
                      <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator{{ $productUrl->url }}" data-width="100%" data-numposts="5"></div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Comment -->
{{--   <section class="comment-fb">
    <div class="container">
      <div class="col-md-12">
        <div class="section-title">
          <h3>Sản phẩm khác</h3>
        </div>
      </div>
    </div>
  </section> --}}
    <!-- RELATED PRODUCTS section -->
  <section class="related-product-section">
    <div class="container">
      <div class="section-title wow fadeInLeft" data-wow-delay=".25s">
        <h2>Sản phẩm khác</h2>
      </div>
      <div class="product-slider owl-carousel">
        @php
          $time = 1;
        @endphp
        @foreach($relatedProducts as $relatedProducts)
        <div class="product-item wow fadeInUp" data-wow-delay=".{{ $time++ }}5s">
          <div class="pi-pic">
            <img src="{{ asset('public/uploads/images/products/'.$relatedProducts->image) }}" alt="">
            <div class="pi-links">
              <a href="{{ url('chi-tiet/'.$relatedProducts->url) }}" class="add-card"><i class="flaticon-bag"></i><span>Mua ngay</span></a>
            </div>
          </div>
          <div class="pi-text">
            <a href="{{ url('chi-tiet/'.$relatedProducts->url) }}"><p>{{ $relatedProducts->name }} </p></a>
          </div>
          <div class="price-text">
              @if ($relatedProducts['promotional_price'] > 0 )
                  <h6 class="old-price">{{ number_format($relatedProducts->price) }}</h6>
                  <h6>{{ number_format($relatedProducts->promotional_price) }}</h6>
                  
              @endif
              @if ($relatedProducts['promotional_price'] ==  0 )
              <h6>{{ number_format($relatedProducts->price) }}</h6>
              @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- RELATED PRODUCTS section end -->
<script>

  $(".size").click(function(){
    $(".size").each(function(){
        if($(this).is(":checked")){  
          $("#ic-size").val($(this).val());        
          let product_id = $("input[name='product_id']").val();
          let quantity = $("input[name='quantity']").val();
          let size_id = $(this).val();
          $.ajax({
            url: "{{ url('cart/check-size-stock') }}",
            type: "POST",
            dataType:'JSON',
            cache: false,
            data: {sizeid: size_id, product_id: product_id, quantity: quantity},
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
            success: function(data){
                //console.log(data);
                if (data.status == '_error') {
                    $('.fw-size-choose').notify(data.msg,'error');
                    $('#addCart').hide();
                    $("#addtoCart")[0].reset();
                    setTimeout(function(){location.reload()},1500);
                }
                else{
                   $('#addCart').show();
                }
            },
            error:function(err) {
                //console.log(err);
            }
        });
        }
    });
  });
  $(".size").change(function() {
      let size_id = $(this).val();
      let product_id = $("input[name='product_id']").val();
      let quantity = $("input[name='quantity']").val();
      $.ajax({
            url: "{{ url('cart/check-size-stock') }}",
            type: "POST",
            dataType:'JSON',
            cache: false,
            data: {sizeid: size_id, product_id: product_id, quantity: quantity},
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
            success: function(data){
                //console.log(data);
                if (data.status == '_error') {
                    $('#size').notify(data.msg,'error');
                    $('#addCart').hide();
                    $("#addtoCart")[0].reset();
                    setTimeout(function(){location.reload()},1500);
                }
                else{
                   $('#addCart').show();
                }
            },
            error:function(err) {
                //console.log(err);
            }
        });
  });
    $("#addCart").click(function() {
      if ( $("#ic-size").val() != '') {
          $("#addtoCart").validate({
            submitHandler: function() {
              let action = $("#addtoCart").attr('action');
              let method = $("#addtoCart").attr('method');
              let form   = $("#addtoCart").serialize();
              $.ajax({
                url: action,
                type: method,
                dataType: "JSON",
                data: form,
                success: function(data){
                  //console.log(data);
                  if (data.status =="_success") {
                      $('html, body').animate({scrollTop: 0}, 'slow');
                      $(".shopping-card span").html(data['count_cart']);
                      $.notify(data.success,"success");
                  }
                  else
                  {
                     $('html, body').animate({scrollTop: 0}, 'slow');
                      $.notify(data.msg,"error");
                  }

                },
                error: function(err){
                  //console.log(err);
                }
              });
            }
          });
      }
      else{
          $('.fw-size-choose').notify("Bạn vui lòng chọn size",'error');
      }
    });
</script>
@endsection

