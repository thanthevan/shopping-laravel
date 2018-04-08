@extends('page.layout')
@section('headmeta')
<title>Unishop | Thành viên-Thông tin đơn hàng đã đặt</title>
<meta name="description" content="home.blade.php">
<meta name="keywords" content="">
<meta name="author" content="ttv">
@endsection
@section('content')
	 <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Đơn hàng</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="{{ route('infouser') }}">Người dùng</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Đơn hàng</li>
            </ul>
          </div>
        </div>
      </div>
     <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-lg-4">
            <aside class="user-info-wrapper">
              <div class="user-info">
                <div class="user-data">
                 <h4>{{Auth::user()->name}}</h4><span> Đăng ký: {{Auth::user()->created_at}}</span>
                </div>
              </div>
            </aside>
            <nav class="list-group">
            	<a class="list-group-item justify-content-between active" href="{{ route('infoorder') }}"><span><i class="icon-bag"></i>Danh sách sản phẩm đã mua</span><span class="badge badge-primary badge-pill">6</span></a>
            	<a class="list-group-item " href="{{ route('infouser') }}"><i class="icon-head"></i>Thông tin cá nhân</a>
            </nav>
          </div>
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>Đơn hàng</th>
                    <th>Ngày mua</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td><span class="text-medium">{{$order->id}}</span></td>
                    <td>{{$order->created}}</td>
                    @if ($order->status==0)
                    <td><span class="text-danger">Chưa thanh toán</span></td>
                    @elseif($order->status==1 )
                     <td><span class="text-medium">Đã thanh toán</span></td>
                    @elseif($order->status==2 )
                     <td><span class="text-medium">Đã hủy</span></td>
                    @endif
                    <td><span class="text-medium">{{number_format($order->total)}} VNĐ</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>
@endsection