@extends('layouts.home.home_layout')
@section('content')
<style type="text/css" media="screen">
  .rm:hover{
   cursor: pointer;
  }
</style>
  <div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
    <div class="container">
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a>{{ $categoryUrl->name }}</a>
      </div>
    </div>
  </div>
    <section class="category-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="filter-widget wow fadeInLeft" data-wow-delay=".25s">
                        <h2 class="fw-title">Danh mục sản phẩm</h2>
                        <ul class="category-menu">
                            @foreach ($menu_data as $item)
                            <li><a href="{{ url('danh-muc/'.$item['url']) }}">{{ $item['name'] }}</a>
                                <ul class="sub-menu">
                                    @if ( count($item['child']) > 0 )
                                    @foreach ($item['child'] as $item1)
                                      <li><a href="{{ url('danh-muc/'.$item1['url']) }}">{{ $item1['name'] }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget mb-0">
                      <form action="{{ url('/filter-price') }}" method="get">
                        @csrf
                      <h2 class="fw-title">lọc</h2>
                      <div class="price-range-wrap">
                        <h4>Price</h4>
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="30000" data-max="400000">
                          <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                          <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
                          </span>
                          <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
                          </span>
                        </div>
                        <div class="range-slider">
                          <div class="price-input">
                            <input type="text" id="minamount" >
                            <input type="text" id="maxamount" >
                          </div>
                        </div>
                      </div>
                       <input type="hidden" id="minprice" name="min_price" value="30000">
                       <input type="hidden" id="maxprice" name="max_price" value="390000">
                       <input type="hidden" id="category_id" name="category_id" value="{{ $categoryUrl->id }}">
                       <input type="hidden" id="category_url" name="url" value="{{ $categoryUrl->url }}">
                        <p><span style="">Giá từ: {{number_format($minPrice)}}</span> đến <span>{{number_format($maxPrice)}}</span><span style="margin-left: 20px;background: #585858;border-radius: 18px;"><span class="rm" style="margin:5px; color: #fff" title="Xóa" onclick="window.location.href='{{url('/danh-muc/'.$categoryUrl->url)}}'">x </span></span></p>
                      <button type="submit" class="btn btn-danger">Lọc</button>
                      </form>
                    </div>
                </div>
                <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row" id="load-data">
                         
                        @php
                            $stt = 2;
                        @endphp
                        @foreach ($proCate as $item)
                        <div class="col-lg-4 col-sm-6 product-other mb-2">
                            <div class="product-item wow fadeInUpBig" data-wow-delay="0.{{ $stt++ }}s">
                                <div class="cover">
                                    <div class="pi-pic" style="padding: 2px;">
                                        @if ($item['promotional_price'] > 0 )
                                        <div class="tag-sale">Đang Sale</div>
                                        @endif
                                        <img src="{{ asset('public/uploads/images/products/'.$item->image) }}" alt="">
                                        <div class="pi-links">
                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span> Mua ngay </span></a>
                                            
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                         <a href="{{ url('chi-tiet/'.$item->url) }}"><p>{{ $item->name }}</p></a>
                                    </div>
                                    <div class="price-text">
                                        @if ($item['promotional_price'] > 0 )
                                            <h6 class="old-price">{{ number_format($item->price) }}</h6>
                                            <h6>{{ number_format($item->promotional_price) }}</h6>
                                            
                                        @endif
                                        @if ($item['promotional_price'] ==  0 )
                                        <h6>{{ number_format($item->price) }}</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class=" w-100 pt-3 wow fadeInUpBig" data-wow-delay="0.35s" id="load_more_button">

                           {{ $proCate->links('home.pagination.paginate') }}
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
    .pagination{
      padding: 30px 0;
    }
    .pagination ul{
      margin: 0 auto;
      padding: 0;
      list-style-type: none;
    }
    .pagination a{
      display: inline-block;
      padding: 10px 18px;
      color: #222;
    }

    /* ONE */

    .p1 a{
      width: 40px;
      height: 40px;
      line-height: 40px;
      padding: 0;
      text-align: center;
    }

    .p1 a.is-active{
      background-color: #2ecc71;
      border-radius: 100%;
      color: #fff;
    }

</style>
@endsection
