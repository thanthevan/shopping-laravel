@extends('page.layout')
@section('headmeta')
<title>Unishop | Tin tức</title>
<meta name="description" content="Chuyên bán ,cung cấp các loại quần áo">
<meta name="keywords" content="">
<meta name="author" content="ttv">
<style type="text/css">
  
  .view-detail{
    position: absolute;
    top: 0;
    left: 0;
    display: none;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
    font-size: 18px;
    color: white;
    text-align: center;
    cursor: pointer;
  }
 .view-detail b {
    position: absolute;top: calc(50% - 10px);left: calc(50% - 44px);font-size: 20px;text-decoration: underline;font-weight: normal;
  }
  .post-thumb{
    position: relative;
  }
  .post-thumb:hover .view-detail{
    
  cursor: pointer;
  display: block;
  }
</style>
@endsection
@section('content')
<!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Tin tức/Bài viết</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Tin tức/Bài viết</li>
            </ul>
          </div>
        </div> 
      </div> 
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1"> 
        <div class="row">
          <!-- Blog Posts-->
            @isset ($post)
                <div class="col-xl-9 col-lg-8 push-xl-3 push-lg-4">
                
            @foreach ($post as $pt)
            <!-- Post-->
            <article class="row">
              <div class="col-md-3 push-md-9">
                <ul class="post-meta">
                  <li><i class="icon-clock"></i><a href="blog-single-ls.html">&nbsp;{{$pt->created}}</a></li>
                  <li><i class="icon-head"></i>&nbsp;{{$pt->auther}}</li>
                  <li><i class="icon-tag"></i><a href="#">&nbsp; {{category_name_post($pt->category_post)}}</a></li>
                </ul>
              </div>
              <div class="col-md-9 pull-md-3 blog-post">
                <a class="post-thumb" href="{{ route('post',['id'=>$pt->id]) }}"><img src="public/uploads/post/{{$pt->img}}" alt="Post"> 
                <span class="view-detail"><b>Xem chi tiết</b></span>
                </a>
                <h3 class="post-title"><a href="{{ route('post',['id'=>$pt->id]) }}">{{$pt->title}}</a></h3>
                <p>{{$pt->meta_describe}}[...]</br>
              </div>
            </article>
                @endforeach  
          
            <!-- Pagination-->
          {{$post->links()}}
          </div>
          @endisset
          
         
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 pull-xl-9 pull-lg-8">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
           
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Danh mục bài viết</h3>
                <ul>
                  @foreach ($categorypost as $cp)
                   <li><a href="#">{{$cp->name}}</a></li>
                  @endforeach
                  
                </ul>
              </section>
              <section class="promo-box" style="background-image: url(public/source/page/img/banners/01.jpg);">
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