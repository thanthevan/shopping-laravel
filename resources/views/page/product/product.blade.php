@extends('page.layout')
@section('headmeta')
<title>Unishop | Sản phẩm</title>
<meta name="description" content="home.blade.php">
<meta name="keywords" content="">
<meta name="author" content="ttv">
@endsection
@section('content')
 <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <input type="hidden" id="router" value="{{route('quickview')}}">
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Danh sách các sản phẩm</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Danh sách các sản phẩm</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Products-->
          <div class="col-xl-9 col-lg-8 push-xl-3 push-lg-4">
 
            <!-- Products Grid-->
             <div class="fill-product">
            <div class="isotope-grid cols-3 mb-2">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>
              <!-- Product-->
             
              @isset($notfound)
                  <h3>Không tìm thấy sản phẩm</h3>
                 
              @endisset
             
              @isset ($products)
              @foreach ($products as $product)
              <div class="grid-item">
                <div class="product-card">
                  <div class="product-badge text-danger">50% Off</div>
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
                    {{$product->promo_price!=0?"<del>".number_format($product->unit_price)." VNĐ</del>".number_format($product->promo_price)." VNĐ":number_format($product->unit_price)." VNĐ"}}
                  </h4>
                  <div class="product-buttons">
                    <button class="btn btn-outline-secondary btn-sm btn-wishlist btn-quickview clearfix-sm-hidden" data-id="{{$product->id}}" data-toggle="tooltip" title="Xem nhanh"><i class="icon-search"></i></button>
                    <button class="  btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="{{$product->product_name}}" data-toast-message="đã thêm vào giỏ hàng!" data-id="{{$product->id }}">Thêm vào giỏ hàng</button>
                  </div>
                </div>
              </div>
                @endforeach
                @endisset
               
            </div>
            <!-- Pagination-->
             @isset ($products)
            {{ $products->links() }}
            @endisset
             </div>
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 pull-xl-9 pull-lg-8">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Danh mục sản phẩm</h3>
                <ul>
                  @foreach ($categories as $key => $category)
                    
                  @php
                $id = $category["id"];
              $ten = $category["name"];
              $alias= $category["alias"];
              @endphp 
               @if ($category['parent_id'] ==0)
                  <li class="has-children expanded"><a href="#">{{$ten}}</a><span>(1138)</span>
                    @php 
                unset($categories[$key]); 
                @endphp
                @foreach ($categories as $k => $item)
                    <ul>
                       @if($item['parent_id']==$id)
                      <li class=""><a href="{{ route('catebyname',['parent_alias'=>$alias,'alias' =>$item['alias'] ]) }}">{{$item['name']}}</a><span>(508)</span></li>
                       @endif
                    </ul>
                   @endforeach    
                  </li>
                  @endif
                  @endforeach
                </ul>
              </section>
              <!-- Widget Price Range-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Lọc theo đơn giá</h3>
                <form class="price-range-slider" method="post" data-start-min="100000" data-start-max="500000" data-min="0" data-max="1500000)" data-step="10000">
                  <div class="ui-range-slider"></div>
                  <footer class="ui-range-slider-footer">
                    <div class="column">
                      <button class="btn btn-outline-primary btn-sm" type="submit">Lọc</button>
                    </div>
                    <div class="column">
                      <div class="ui-range-values">
                        <div class="ui-range-value-min">
                          <input type="hidden" name="price_min"><span></span> VNĐ
                        </div>
                        <div class="ui-range-value-max" >
                          <input type="hidden" name="price_max"><span></span> VNĐ
                        </div>
                      </div>
                    </div>
                  </footer>
                </form>
              </section>
              <!-- Widget Brand Filter-->
              <section class="widget">
                <h3 class="widget-title">Lọc theo kích thước số</h3>
                @php
                  $size =size_lib();
                @endphp
                @foreach (  $size['number'] as $nb)
                 <label class="custom-control custom-checkbox " style="font-size:  14px !important">
                  <input name="sz" class="custom-control-input fill" value="{{$nb}}" type="checkbox"><span class="custom-control-indicator"></span><span class="custom-control-description">{{$nb}}&nbsp;</span>
                </label>
                @endforeach
                
              </section>
              <!-- Widget Size Filter-->
              <section class="widget">
                <h3 class="widget-title">Lọc theo kích thước chữ</h3>
                @foreach (  $size['word'] as $nb)
                 <label class="custom-control custom-checkbox ">
                  <input name="sz" class="custom-control-input fill" value="{{$nb}}" type="checkbox" ><span class="custom-control-indicator"></span><span class="custom-control-description">{{$nb}}&nbsp;</span>
                </label>
                @endforeach
              </section>
              <!-- Promo Banner-->
              <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
                <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
                <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                  <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                  <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
                </div>
              </section>
            </aside>
          </div>
        </div>
      </div>
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