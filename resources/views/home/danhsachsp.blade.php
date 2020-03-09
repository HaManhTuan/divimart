@extends('layouts.home.home_layout')
@section('content')
  <div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
    <div class="container">
      <div class="site-pagination">
        <a href="{{ url('/') }}">Trang chủ</a> /
        <a>Kết quả tìm kiếm:"{{ $search_product }}"</a>
        <a>- {{ $productsAll->count() }} kết quả</a>
      </div>
    </div>
  </div>
    <section class="product-filter-section mt-5">
        <div class="container">
            <div class="row">
                @php
                    $time = 0.1;
                @endphp
                @foreach($productsAll as $item)
                <div class="col-lg-3 col-sm-6 mb-3 product-other">
                    <div class="product-item wow fadeInUp" data-wow-delay="{{ $time = $time + 0.2 }}s">
                         <div class="cover">
                        <div class="pi-pic" style="padding: 2px;">
                            <a href="{{ url('chi-tiet/'.$item->url) }}"> <img src="{{ asset('uploads/images/products/'.$item->image) }}" alt=""></a>
                           
                            <div class="pi-links">
                                <a href="{{ url('chi-tiet/'.$item->url) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                
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
            <div class="row">
                    <div class=" w-100 pt-3 wow fadeInUpBig" data-wow-delay="0.35s" id="load_more_button">

                           {{ $productsAll->links('home.pagination.paginate') }}
                    
                    </div>
            </div>
{{--             <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            </div> --}}
        </div>
    </section>
@endsection