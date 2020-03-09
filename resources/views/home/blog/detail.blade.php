@extends('layouts.home.home_layout')
@section('content')
<div class="page-top-info wow fadeInLeft" data-wow-delay=".25s">
   <div class="container">
      <div class="site-pagination">
         <a href="{{ url('/') }}">Trang chủ</a> /
         <a href="{{ url('blog') }}">Blog</a> /
         <a>{{ $dataBlog->name }}</a> 
      </div>
   </div>
</div>
<section class="blog-section spad">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
			<h3>{{ $dataBlog->name }}</h3>
			<small>{{ $dataBlog->created_at }}</small>
			<p>{{ $dataBlog->description }}</p>
         </div>
       </div>
       <div class="row">
       	<div class="col-md-8">
       		{!! $dataBlog->content !!}
       	</div>
       </div>
     </div>
 </section>
 @endsection
