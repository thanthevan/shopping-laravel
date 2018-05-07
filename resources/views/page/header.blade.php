 <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="get">
        <input type="text" name="site_search" id ="site_search" placeholder="Tìm thương hiệu, sản phẩm ...">
        <div class="search-tools"><span class="clear-search">Xóa</span><span class="close-search"><i class="icon-cross"></i></span></div>
        <div class="result_search">
          
        </div>
      </form>
      <div class="site-branding">
        <div class="inner" style="margin-left: 74px;">
         {{--  <a class="offcanvas-toggle cats-toggle" href="#shop-categories" ></a>
       <a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a> --}}
          <!-- Site Logo--><a class="site-logo"  href="{{ route('home') }}"><img src="public/source/page/img/logo/logo.png" alt="Unishop"></a>
        </div>
      </div>
      @php
        $active = isset(Request::segments(2)[0])?Request::segments(2)[0]:'';
      @endphp
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          <li class="{{ $active ===''?'active':''}}"><a href="{{ route('home') }}"><span>Trang chủ</span></a>
          </li>
          <?php
use App\Category;
use Cart as CART;
$category = Category::orderBy('name' ,'ASC')->get();
?>

          <li class="has-megamenu  {{ $active==='san-pham'?'active':''}}"><a href=" {{ route('product') }}"><span>Sản phẩm</span></a>
            <ul class="mega-menu">
              @foreach ($category as $key => $val)
              @php
                $id = $val["id"];
              $ten = $val["name"];
              $alias= $val["alias"];
              @endphp
               @if ($val['parent_id'] ==0)
              <li><span class="mega-menu-title">{{$ten}}</span>
                @php
                unset($category[$key]);
                @endphp
                @foreach ($category as $k => $item)
                <ul class="sub-menu">
                  @if($item['parent_id']==$id)
                  <li><a href="{{ route('catebyname',['parent_alias'=>$alias,'alias' =>$item['alias'] ]) }}">{{ $item['name'] }}</a></li>
                  @endif
                </ul>
                @endforeach
              </li>
               @endif

               @endforeach
                <li>
                <section class="promo-box" style="background-image: url(public/source/page/img/banners/02.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
                  <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                    <h4 class="text-light text-thin text-shadow">Khuyễn mãi</h4>
                    <h3 class="text-bold text-light text-shadow">Giảm giá ưu đãi</h3><a class="btn btn-sm btn-primary" href="{{ route('typeproduct',['alias'=>'sale']) }}">Xem ngay</a>
                  </div>
                </section>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(public/source/page/img/banners/03.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
                  <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                    <h4 class="text-light text-thin text-shadow">Sản phẩm</h4>
                    <h3 class="text-bold text-light text-shadow">Mới đến bất ngờ</h3><a class="btn btn-sm btn-primary" href="{{ route('typeproduct',['alias'=>'new']) }}">Xem ngay</a>
                  </div>
                </section>
              </li>
            </ul>
          </li>
          <li class="{{ $active==='tin-tuc'?'active':''}}"><a href="{{ route('blog') }}"><span>Tin tức/Blog</span></a>
          </li>
          <li class="{{ $active==='gioi-thieu'?'active':''}}"><a href="#"><span>Giới thiệu</span></a>
            <ul class="sub-menu">
                <li><a href="{{ route('info') }}">Về Chúng tôi</a></li>
              
              </li>
              <li ><a href="{{ route('support') }}"><span>Hình thức thanh toán</span></a></li>
              </ul>
          </li>
          <li class="{{ $active==='lien-he'?'active':''}}"><a href="{{ route('contact') }}"><span>Liên hệ</span></a></li>

        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <div class="search"><i class="icon-search"></i></div>
            
                @if(Auth::guard('web')->check())
                <div class="account" style="{{(Auth::guard('web')->check()===true)?'border: 2px solid #0da9ef;':''}}"><a href="{{route('infouser')}}"></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-title"><span>Xin chào: {{ changestring(Auth::guard('web')->user()->name,' ')}}</span></li>
                <li><a href="{{ route('infouser') }}">Thông tin</a></li>
                <li><a href="{{ route('infoorder') }}">Sản phẩm đã mua</a></li>
                <li class="sub-menu-separator"></li>
                <li><a href="{{ route('logout') }}"> <i class="icon-unlock"></i>Đăng xuất</a></li>
                 </ul>
            </div>
                @endif
             

            <div class="cart" id="cart-mini-title">
           <i class="icon-bag"></i><span class="count">{{CART::count()!=0?CART::count():0}}</span><span class="subtotal">{{ CART::total()!=0?CART::total()." VNĐ":"0 VNĐ" }}</span>
            </div>
            @if ($active==='gio-hang'|| $active==='thanh-toan')
              <div class="cart1" id="hidden" style="display: none;">
            @else
               <div class="cart1" id="cart-mini-content" >
            @endif

              <div class="toolbar-dropdown">
                      <div class="modal-body qq" style="margin-top: 14px;">
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
                <div class="cart-ajax" style="overflow-y:auto;height:150px;">

              @if(CART::content()->count()!=0)
               @foreach (CART::content() as $cart)
                <div class="dropdown-product-item"><span class="dropdown-product-remove"  title="Xóa" row-id="{{$cart->rowId}}"><i class="icon-cross" ></i></span><a class="dropdown-product-thumb" href="{{ route('detailproduct',['alias'=>$cart->options->alias,'id'=>$cart->id]) }}"><img src="public/uploads/product/{{$cart->options->image}}" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title"  href="{{ route('detailproduct',['alias'=>$cart->options->alias,'id'=>$cart->id]) }}">{{$cart->name}}</a><span class="dropdown-product-details" style="color: black;">{{$cart->qty." x ".number_format($cart->price)." VNĐ"}}
                    <p><span style="color:black">Màu sắc:</span><span style="display: inline-block;background-color:{{$cart->options->color}}; width:10px;height:10px;"></span><span style="color:black">  Kích cỡ:</span><span style="color:black;font-weight:bold;">{{$cart->options->size}}</span></p></div>
                </div>
              @endforeach
                 @endif
                 </div>
                 <div class="toolbar-dropdown-group tt1" >
                  <div class="column"><span class="text-lg">Tổng tiền:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium totalajax">{{CART::total()." VNĐ"}}&nbsp;</span></div>
                </div>
                <div class="toolbar-dropdown-group tt2">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="{{ route('cart-list') }}">Xem giỏ hàng</a></div>
                  <div class="column"><a class="btn btn-sm btn-block btn-success" href="{{ route('getcheckout') }}">Đặt hàng</a></div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>