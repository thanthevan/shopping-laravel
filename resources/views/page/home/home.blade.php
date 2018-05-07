@extends('page.layout')
@section('headmeta')
<title>Unishop | Trang chủ</title>
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
     <!-- Page Content-->
   <!-- Main Slider-->

@include('page.home.slider')
<!-- Top Categories-->

      <section class="container padding-top-3x">
        <h3 class="text-center mb-30">Danh mục sản phẩm</h3>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="{{ route('typeproduct',['alias'=>'new']) }}">
                <div class="inner">
                  <div class="main-img"><img src="public/source/page/img/shop/categories/24.jpg" alt="Category"></div>
                  <div class="thumblist"><img src="public/source/page/img/shop/categories/26.jpg" alt="Category"><img src="public/source/page/img/shop/categories/25.jpg" alt="Category"></div>
                </div></a>
              <div class="card-block text-center">
                <h4 class="card-title">Sản phẩm mới</h4>
               <a class="btn btn-outline-primary btn-sm" href="{{ route('typeproduct',['alias'=>'new']) }}">Xem chi tiết</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="{{ route('typeproduct',['alias'=>'sale']) }}">
                <div class="inner">
                  <div class="main-img"><img src="public/source/page/img/shop/categories/21.jpg" alt="Category"></div>
                  <div class="thumblist"><img src="public/source/page/img/shop/categories/22.jpg" alt="Category"><img src="public/source/page/img/shop/categories/23.jpg" alt="Category"></div>
                </div></a>
              <div class="card-block text-center">
                <h4 class="card-title">Sản phẩm Sale</h4>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('typeproduct',['alias'=>'sale']) }}">Xem chi tiết</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="{{ route('typeproduct',['alias'=>'top']) }}">
                <div class="inner">
                  <div class="main-img"><img src="public/source/page/img/shop/categories/18.jpg" alt="Category"></div>
                  <div class="thumblist"><img src="public/source/page/img/shop/categories/19.jpg" alt="Category"><img src="public/source/page/img/shop/categories/20.jpg" alt="Category"></div>
                </div></a>
              <div class="card-block text-center">
                <h4 class="card-title">Sản phẩm bán chạy</h4>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('typeproduct',['alias'=>'top']) }}">Xem chi tiết</a>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="{{ route('product') }}">Xem tất cả</a></div>
      </section>
      <!-- Promo #1-->
      <section class="container-fluid padding-top-3x">
        <div class="row">
          <div class="col-xl-5 col-lg-6 offset-xl-1 mb-30">
            
              <div class="img-cover rounded" style="background-image: url(public/source/page/img/banners/home01.jpg);"></div>
         
          </div>
          <div class="col-xl-5 col-lg-6 mb-30" style="min-height: 270px;">
            <div class="img-cover rounded" style="background-image: url(public/source/page/img/banners/home02.jpg);"></div>
          </div>
        </div>
      </section>
      <!-- Promo #2-->
      <section class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-12 offset-xl-1">
            <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(public/source/page/img/banners/banner.png);"><span class="overlay rounded" style="opacity: .35;"></span>
              <div class="text-center">
                <h3 class="display-4 text-normal text-white text-shadow mb-1">bộ sưu tập mới</h3>
                <h2 class="display-2 text-bold text-white text-shadow">2018!</h2>
                <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">ghé thăm ngày</h4><br><a class="btn btn-primary margin-bottom-none" href="{{ route('product') }}">xem bộ sưu tập</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Featured Products Carousel-->
      <section class="container padding-top-3x padding-bottom-3x">
        <input type="hidden" id="router" value="{{ route('quickview') }}">
        <h3 class="text-center mb-30">Sản phẩm bán chạy</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          <!-- Product-->
          @isset ($products)
          @foreach ($products as $product)
         
        
             <div class="grid-item">
                <div class="product-card">
                  @if($product->promo_price!=0)
                    <div class="product-badge text-danger">Giảm giá: {{(round(100*($product->unit_price-$product->promo_price)/$product->unit_price)) }}%</div>
                    @elseif($product->status==2)
                     <div class="product-badge text-danger">Mới</div>
                     @endif
                  <div class="rating-stars">
                    @php
                      $vote=$product->vote;
                    @endphp
                    @for ($i = 0; $i<$vote; $i++)
                       <i class='icon-star filled'></i>  
                    @endfor
                    </div>
                  <a class="product-thumb" href="{{ route('detailproduct',['alias'=>$product->alias,'id'=>$product->id]) }}"><img src="public/uploads/product/{{$product->image_product[0]['image']}}" alt="Product"></a>
                  <h3 class="product-title"><a href="{{ route('detailproduct',['alias'=>$product->alias,'id'=>$product->id]) }}">{{$product->product_name}}</a></h3>
                  <h4 class="product-price">
                    @if($product->promo_price!=0)
                    <del>{{number_format($product->unit_price)}} VNĐ</del> 
                    {{number_format($product->promo_price)." VNĐ"}}
                    @else
                    {{number_format($product->unit_price)." VNĐ"}}
                    @endif
                  </h4>
                  <div class="product-buttons">
                    <button class="btn btn-outline-secondary btn-sm btn-wishlist btn-quickview clearfix-sm-hidden" data-id="{{$product->id}}" data-toggle="tooltip" title="Xem nhanh"><i class="icon-search"></i></button>
                  {{--   <button class="  btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="{{$product->product_name}}" data-toast-message="đã thêm vào giỏ hàng!" data-id="{{$product->id }}">Thêm vào giỏ hàng</button> --}}
                  </div>
                </div>
              </div>

            @endforeach
          @endisset
         
        
        </div>
      </section>
      <!-- Product Widgets-->
     <section class="container padding-top-3x padding-bottom-3x">
        <h3 class="text-center mb-30">Bài viết</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:1},&quot;768&quot;:{&quot;items&quot;:1},&quot;991&quot;:{&quot;items&quot;:1},&quot;1200&quot;:{&quot;items&quot;:1}} }">
          <!-- Product-->
          @foreach ($post as $pt)
            
          
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
          
        </div>
      </section>
</div>
<div class="modal fade" id="quickviewproduct" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Chi tiết sản phẩm</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body qv" >
            <div class="atom-spinner">
            <div class="spinner-inner">
            <div class="spinner-line"></div>
            <div class="spinner-line"></div>
            <div class="spinner-line"></div>
            <div class="spinner-circle">
      &#9679;
    </div>
  </div>
</div>
        </div>
      </div>
    </div>
      </div>
@endsection
