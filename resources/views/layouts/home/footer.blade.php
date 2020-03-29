  <section class="footer-section wow fadeInUp" data-wow-delay=".35s">
    <div class="container">
      <div class="footer-logo text-center">
        <a href="{{ url('/') }}"><img src="{{ asset('public/frontend/img/logo-light-1.png') }}" alt=""></a>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="footer-widget about-widget">
            <h2>Về chúng tôi</h2>
            <p>Siêu thị là 1 trong những siêu thị bán quần áo trẻ em tại Việt Nam</p>
            <img src="{{ asset('public/frontend/img/cards.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="footer-widget about-widget">
            <h2>Danh mục</h2>
            <ul>
              <li><a href="{{ url('blog') }}">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="footer-widget contact-widget">
            <h2>Thông tin</h2>
            <div class="con-info">
              <span>C.</span>
              <p>{{ $dataConfig->title }}</p>
            </div>
            <div class="con-info">
              <span>B.</span>
              <p>{{ $dataConfig->address }}</p>
            </div>
            <div class="con-info">
              <span>T.</span>
              <p>{{ $dataConfig->phone }}</p>
            </div>
            <div class="con-info">
              <span>E.</span>
              <p>{{ $dataConfig->email }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="social-links-warp">
      <div class="container">
        <div class="social-links">
          <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
          <a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
          <a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
          <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
          <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
          <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
          <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
        </div>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </div>
    </div>
  </section>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=244735576425485&autoLogAppEvents=1"></script>
