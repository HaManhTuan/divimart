@extends('layouts.home.home_layout')
@section('content')
    <!-- Home slideder-->
    @include('layouts.home.slider')
    <!-- END Home slideder-->
  {{--  @include('layouts.home.service') --}}
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title wow fadeInLeft" data-wow-delay=".25s">
                <h2>Sản phẩm mới nhất</h2>  
            </div>
            <div class="product-slider owl-carousel">
                @php
                    $time = 1;
                @endphp
                @foreach ($producNew as $item)
                <div class="product-item wow fadeInUp" data-wow-delay=".{{ $time++ }}s" style=" cursor: pointer;">
                    <div class="pi-pic">
                        <img src="{{ asset('public/uploads/images/products/'.$item->image) }}" alt="">
                        <div class="pi-links">
                            <a href="{{ url('chi-tiet/'.$item->url) }}" class="add-card"><i class="flaticon-bag"></i><span>Mua Ngay</span></a>
                           
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- letest product section end -->

    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="section-title wow fadeInLeft" data-wow-delay=".35s">
                <h2>Các sản phẩm khác</h2>
            </div>
            <ul class="product-filter-menu">
                @php
                    $time = 1;
                @endphp
                @foreach($categoryother as $item)
                <li class="wow fadeInLeft" data-wow-delay=".{{ $time++ }}s"><a href="{{ url('/'.$item->url) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
            <div class="row">
                @php
                    $time = 1;
                @endphp
                @foreach($dataProduct as $item)
                <div class="col-lg-3 col-sm-6 product-other mb-2">
                    <div class="product-item wow fadeInUp" data-wow-delay=".{{ $time++ }}s">
                        <div class="cover">
                            <div class="pi-pic" style="padding: 2px;">
                                <a href="{{ url('chi-tiet/'.$item->url) }}"> <img src="{{ asset('public/uploads/images/products/'.$item->image) }}" alt=""></a>
                               
                                <div class="pi-links">
                                    <a href="{{ url('chi-tiet/'.$item->url) }}" class="add-card"><i class="flaticon-bag"></i><span>Mua Ngay</span></a>
                                    
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
            </div>
{{--             <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            </div> --}}
        </div>
    </section>
    <!-- Product filter section end -->
@endsection