@extends('page.layout')
@section('headmeta')
<title>Unishop | Thanh toán</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Thân Thế Văn">
@endsection
@section('content')
 <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Thanh toán</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Thanh toán</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
       
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
          <form action="{{ route('checkout') }}" method="post">
          {{csrf_field()}}
            <div class="checkout-steps">
            	<a  class="active" href="checkout-review.html">2. Hình thức thanh toán</a>
            	<a class="active" href="checkout-address.html"><span class="angle"></span>1. Thông tin khách hàng</a></div>
         
            <hr class="padding-bottom-1x">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group"> 
                  <label for="checkout-fn">Họ và tên</label>
                  <input class="form-control" type="text" name="name" id="checkout-fn" value="{{(Auth::guard('web')->check()===true )?Auth::guard('web')->user()->name:''}}"  required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                 <label class="custom-control custom-radio d-block">
                  <input class="custom-control-input" type="radio" name="payment" value="offline" id="offline" checked><span class="custom-control-indicator"></span><span class="custom-control-description">Thanh toán sau khi nhận hàng</span>
                </label>
                </div>
              </div>
            </div>
               <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone">Số điện thoại</label>
                  <input class="form-control" type="text" name="phone" id="checkout-phone" value="{{(Auth::guard('web')->check()===true )?Auth::guard('web')->user()->phone:''}}" required>
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                 <label class="custom-control custom-radio d-block">
                  <input class="custom-control-input" type="radio" name="payment" id="offline" value="paypal"><span class="custom-control-indicator"></span><span class="custom-control-description">Thanh toán qua paypal</span>
                </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-email">E-mail</label>
                  <input class="form-control" type="email" name="email" id="checkout-email" value="{{(Auth::guard('web')->check()===true )?Auth::guard('web')->user()->email:''}} " required>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address">Địa chỉ</label>
                  <input class="form-control" type="text" name="address" id="checkout-address" value="{{(Auth::guard('web')->check()===true )?Auth::guard('web')->user()->address:''}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="checkout-note">Ghi chú</label>
                  <textarea class="form-control" type="text" name="note" id="checkout-note" rows="4"></textarea>
                </div>
              </div>
            </div>
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="{{ route('cart-list') }}"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Trở lại giỏ hàng</span></a></div>
              <div class="column"><button class="btn btn-primary" ><span class="hidden-xs-down">Xác nhận</span><i class="icon-arrow-right"></i></button></div>
            </div>
      
          </form>

              </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              
              <!-- Featured Products Widget-->
              <section class="widget widget-featured-products">
                <h3 class="widget-title">Sản phẩm đặt mua</h3>
                <!-- Entry-->
                {{-- //<div style="overflow-y: auto; height: 400px; width:400px" > --}}
              @foreach ($carts as $cart)
                
              
                <div class="entry" >
                  <div class="entry-thumb"><a href="shop-single.html"><img src="public/uploads/product/{{$cart->options->image}}" alt="Product"></a></div>
                  <div class="entry-content" >
                    <h4 class="entry-title"><a href="shop-single.html">{{$cart->name}}</a></h4><span class="entry-meta">{{$cart->qty." x ".$cart->price." VNĐ"}}</span>
                     <p><span style="color:black">Màu sắc:</span><span style="display: inline-block;background-color:{{$cart->options->color}}; width:10px;height:10px;"></span><span style="color:black">  Kích cỡ:</span><span style="color:black;font-weight:bold;">{{$cart->options->size}}</span></p>
                  </div>
                </div>
                @endforeach
              {{--   </div> --}}
              </section>
              <!-- Order Summary Widget-->
              <section class="widget widget-order-summary">
                <h3 class="widget-title">Chi tiết đơn hàng</h3>
                <table class="table">
                  <tr>
                    <td>Tổng tiền:</td>
                    <td class="text-medium">{{$total or 0}} VNĐ</td>
                  </tr>
                  <tr>
                    <td>Phí ship:</td>
                    <td class="text-medium">0 VNĐ</td>
                  </tr>
                  <tr>
                    <td>Thuế:</td>
                    <td class="text-medium">0 VNĐ</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="text-lg text-medium">{{$total or 0}} VNĐ</td>
                  </tr>
                </table>
              </section>
              <!-- Promo Banner-->
              <section class="promo-box" style="background-image: url(img/banners/02.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
                <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                  <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                  <h3 class="text-bold text-light text-shadow">Sunglasses</h3><a class="btn btn-outline-white btn-sm" href="shop-grid-ls.html">Shop Now</a>
                </div>
              </section>
            </aside>
          </div>
        </div>
      </div>
       
    </div>
@endsection