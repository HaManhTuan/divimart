
  <header class="header-section">
    <div class="header-top wow fadeInDown" data-wow-delay=".25s">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 text-center text-lg-left">
            <!-- logo -->
            <a href="{{ url('/') }}" class="site-logo">
              <img src="{{ asset('public/uploads/images/config/'.$dataConfig->img_logo) }}" alt="">
            </a>
          </div>
          <div class="col-xl-6 col-lg-5">
            <form class="header-search-form" action="{{ url('search-product') }}" method="POST">
              @csrf
              <input type="text" name="keyword" placeholder="Tìm kiếm ...">
              <button type="submit"><i class="flaticon-search"></i></button>
            </form>
          </div>
          <div class="col-xl-4 col-lg-5 text-left">
            <div class="user-panel">
              @if(Auth::guard('customers')->check())
              <div class="up-item">
                <ul class="main-menu">
                    <li><i class="flaticon-profile"></i> {{ Auth::guard('customers')->user()->name}}
                      <ul class="sub-menu">
                          <li><a href="{{ url('account/history-order') }}">Lịch sử</a></li>
                          <li><a href="{{ url('account/view-account') }}">Tài khoản</a></li>
                          <li><a href="{{ url('logout-home') }}">Đăng xuất</a></li>
                      </ul>
                    </li>
                </ul>
              </div>
              @else
              <div class="up-item">
                <i class="flaticon-profile"></i>
                <a href="{{ url('registerfrm') }}">Đăng kí</a> hoặc <a href="{{ url('loginfrm') }}">Đăng nhập</a>
              </div>
              @endif
              <div class="up-item">
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  @if ($count_cart > 0)
                    <span>{{ $count_cart }}</span>
                  @else
                   <span>0</span>
                  @endif

                </div>
                <a href="{{ url('cart/view-cart') }}">Giỏ hàng</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="main-navbar wow fadeInDown" data-wow-delay=".25s">
      <div class="container">
        <!-- menu -->
        <ul class="main-menu">
          <li><a href="{{ url('/') }}">Trang chủ</a></li>
          @foreach ($menu_data as $item)
          <li><a href="{{ url('danh-muc/'.$item['url']) }}">{{ $item['name'] }}</a>
            @if ( count($item['child']) > 0 )
              <ul class="sub-menu">
                @foreach ($item['child'] as $item1)
                  <li><a href="{{ url('danh-muc/'.$item1['url']) }}">{{ $item1['name'] }}</a></li>
                @endforeach
              </ul>
            @endif
          </li>
          @endforeach
          <li><a href="{{ url('blog') }}">Blog</a></li>
          <li><a href="{{ url('contact') }}">Liên hệ</a></li>
        </ul>
      </div>
    </nav>
  </header>