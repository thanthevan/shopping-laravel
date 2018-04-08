@extends('page.layout')
@section('headmeta')
<title>Unishop | Giỏ hàng</title>
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
            <h1>Giỏ hàng</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Giỏ hàng</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <!-- Alert-->

        @if ($totals==0)
             <h2 style="text-align: center;">Không có sản phẩm nào trong giỏ hàng</h2>

        @else

        <!-- Shopping Cart-->

        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>Tên sản phẩm</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Đơn giá</th>
                <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="{{ route('cart-delete-all') }}">Xóa tất cả</a></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($carts as $cart)
              <tr>
                <td>
                  <div class="product-item"><a class="product-thumb" href="{{ route('detailproduct',['alias'=>$cart->options->alias,'id'=>$cart->id]) }}"><img src="public/uploads/product/{{$cart->options->image}}" alt="{{$cart->name}}"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="{{ route('detailproduct',['alias'=>$cart->options->alias,'id'=>$cart->id]) }}">{{$cart->name}}</a></h4><span><em>Size:</em> {{$cart->options->size}}</span><span><em>Màu sắc:</em><span style="display: inline-block;background-color:{{$cart->options->color}}; width:10px;height:10px;"></span>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="count-input">
                    <select class="form-control total-quanlity" data-rowid="{{$cart->rowId}}" > 
                      @for ($i = 1; $i <=10; $i++)
                         @if ($i==$cart->qty)
                          <option selected>{{$i}}</option>
                         @else
                         <option >{{$i}}</option>
                         @endif
                      @endfor
                    </select>
                  </div>
                </td>
                <td class="text-center text-lg text-medium">{{ number_format($cart->price)." VNĐ"}}</td>
                <td class="text-center"><span class="remove-from-cart" data-rowid="{{$cart->rowId}}" data-toggle="tooltip" title="Xóa"><i class="icon-cross"></i></span></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          <div class="column text-lg">Tổng tiền: <span class="text-medium">{{$totals." VNĐ"}}</span></div>
        </div>
         @endif
        <div class="shopping-cart-footer">
          <div class="column">
          	<a class="btn btn-outline-secondary" href="{{ route('product') }}"><i class="icon-arrow-left"></i>&nbsp;Tiếp tục mua hàng</a></div>
          @if ($totals!=0)<div class="column"><a class="btn btn-success" href="{{ route('getcheckout') }}">Thanh toán</a></div>@endif
        </div>
      </div>
    </div>
@endsection