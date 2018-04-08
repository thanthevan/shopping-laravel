@extends('page.layout')
@section('headmeta')
<title>Unishop | Tin tức</title>
<meta name="description" content="Chuyên bán ,cung cấp các loại quần áo">
<meta name="keywords" content="">
<meta name="author" content="ttv">
@endsection
@section('content')
 <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>{{$pt->title}}</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="blog-ls.html">Tin tức/Blog</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>bài viết</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row"> 
          <!-- Content-->
          @isset ($pt)
        
          <div class="col-xl-9 col-lg-8 push-xl-3 push-lg-4">
            <!-- Post-->
            <div class="single-post-meta">
              <div class="column">
                <div class="meta-link"><span>viết bởi</span>{{$pt->auther}}</div>
                <div class="meta-link"><span>Danh mục</span><a href="#">{{category_name_post($pt->category_post)}}</a></div>
              </div>
              <div class="column">
                <div class="meta-link"><a href="#"><i class="icon-clock"></i>{{$pt->created}}</a></div>
              
              </div>
            </div>
            <div  >
              <figure><img src="public/uploads/post/{{$pt->img}}" alt="Image">
                <figcaption class="text-white">Image Caption</figcaption>
              </figure>
            </div>

            <h2 class="padding-top-2x">{{$pt->title}}</h2>
           @php
           echo html_entity_decode($pt->decribe,ENT_QUOTES);
              
            @endphp 
            <div class="single-post-footer">

              <div class="column">
                <div class="entry-share"><span class="text-muted">Chia sẻ bài viết:</span>
                  <div class="fb-share-button" data-href="{{ route('post',['id'=>$pt->id]) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
            
                </div>
              </div>
            </div>
            <!-- Post Navigation-->
    {{--         <div class="entry-navigation">
              <div class="column text-left"><a class="btn btn-outline-secondary btn-sm" href="#"><i class="icon-arrow-left"></i>&nbsp;Prev</a></div>
              <div class="column"><a class="btn btn-outline-secondary view-all" href="blog-ls.html" data-toggle="tooltip" data-placement="top" title="All posts"><i class="icon-menu"></i></a></div>
              <div class="column text-right"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
            </div> --}}
          </div>
            @endisset
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 pull-xl-9 pull-lg-8">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Widget Search-->
  {{--             <section class="widget">
                <form class="input-group form-group" method="get"><span class="input-group-btn">
                    <button type="submit"><i class="icon-search"></i></button></span>
                  <input class="form-control" type="search" placeholder="Search blog">
                </form>
              </section>
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Categories</h3>
                <ul>
                  <li><a href="#">Editor's Choice</a><span>(24)</span></li>
                  <li><a href="#">Fashion</a><span>(12)</span></li>
                  <li><a href="#">Travel</a><span>(5)</span></li>
                  <li><a href="#">Online Shopping</a><span>(7)</span></li>
                  <li><a href="#">Closing Design</a><span>(3)</span></li>
                </ul>
              </section>
              <!-- Widget Featured Posts--> --}}
              <section class="widget widget-featured-posts">
                <h3 class="widget-title">Featured Posts</h3>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/01.jpg" alt="Post"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="blog-single-rs.html">Trending Winter Boots</a></h4><span class="entry-meta">by Olivia Reyes</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="blog-single-rs.html">Global Travel And Vacations Luxury Travel On A Tight Budget</a></h4><span class="entry-meta">by Logan Coleman</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/02.jpg" alt="Post"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="blog-single-rs.html">Hoop Earrings A Style From History</a></h4><span class="entry-meta">by Cynthia Gomez</span>
                  </div>
                </div>
              </section>
              <!-- Widget Tags-->

              <!-- Promo Banner-->
              <section class="promo-box" style="background-image: url(img/banners/01.jpg);">
                <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .35;"></span>
                <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                  <h3 class="text-bold text-light text-shadow">New 2017<br>Handbag Collection</h3>
                  <h4 class="text-light text-thin text-shadow">has just arrived!</h4><a class="btn btn-sm btn-primary" href="shop-grid-ls.html">Shop Now</a>
                </div>
              </section>
            </aside>
          </div>
        </div>
      </div>
    </div>
@endsection