

@extends('layouts.home.home_layout')
@section('content')
<div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
   <div class="container">
      <div class="site-pagination">
         <a href="{{ url('/') }}">Trang chủ</a> /
         <a>Blog</a>
      </div>
   </div>
</div>
<section class="blog-section spad">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            @foreach ($dataBlog as $item)
            <div class="post-block product-other">
              <div class="cover">
                  <div class="post-image">
                    <a href="{{ url('blog/'.$item->id) }}">
                    <img src="{{ asset('public/uploads/images/blogs/'.$item->img) }}" typeof="Image">
                    </a>
                 </div>
                 <div class="post-content">
                    <div class="post-title"><a href="{{ url('blog/'.$item->id) }}">{{ $item->name }}</a></div>
                    <div class="post-meta margin-bottom-10"><span class="post-created"> {{ $item->created_at }} </span></div>
                    <div class="body hidden-xs">{{ $item->description }}</div>
                    <div class="tags"></div>
                 </div>
              </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
<style>
   .post-block .post-image {
   width: 20%;
   float: left;
   }
   .post-block .post-image a {
   position: relative;
   display: block;
   }
   .post-block .post-image img {
   height: auto;
   width: 100%;
   }
   .post-block .post-image img {
   width: 100%;
   -webkit-transition: all 0.4s;
   -o-transition: all 0.4s;
   transition: all 0.4s;
   -moz-transition: all 0.4s;
   -ms-transition: all 0.4s;
   }
   .post-block .post-content {
   padding-top: 5px;
   width: 60%;
   padding-left: 15px;
   float: left;
   }
    .post-block .post-meta {
    margin-top: 3px;
}
.post-block .post-meta {
    font-size: 13px;
    font-weight: 400;
    padding: 5px 0;
}
.margin-bottom-10 {
    margin-bottom: 10px !important;
}
.post-block .post-title {
    padding-top: 0;
    color: black;
}
</style>
@endsection

