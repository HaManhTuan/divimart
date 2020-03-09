    <!-- Hero section -->
    <section class="hero-section wow fadeInUp" data-wow-delay=".35s">
        <div class="hero-slider owl-carousel">
            @foreach ($media as $item)
            <div class="hs-item set-bg">
                <img src="{{ asset('public/uploads/images/sliders/'.$item->image) }}" alt="">
            </div>
            @endforeach
        </div>
        <div class="container">
            <div class="slide-num-holder" id="snh-1"></div>
        </div>
    </section>
