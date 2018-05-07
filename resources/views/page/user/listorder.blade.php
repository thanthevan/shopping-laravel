@extends('page.layout')
@section('headmeta')
<title>Unishop | Thành viên-Thông tin đơn hàng đã đặt</title>
<meta name="description" content="home.blade.php">
<meta name="keywords" content="">
<meta name="author" content="ttv">
<style>
  #od td{
    vertical-align: sub;
  }
</style>
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
            	<a class="list-group-item justify-content-between active" href="{{ route('infoorder') }}"><span><i class="icon-bag"></i>Danh sách sản phẩm đã mua</span></a>
            	<a class="list-group-item " href="{{ route('infouser') }}"><i class="icon-head"></i>Thông tin cá nhân</a>
            </nav>
          </div>
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up">
              @if (session('msg'))
          <div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-ban"></i>&nbsp;&nbsp;<strong>Thông báo:</strong> {{session('msg')}}</div>

          @elseif(session('ms'))
            <div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-check"></i>&nbsp;&nbsp;<strong>Thông báo:</strong> {{session('ms')}}</div>
          @endif 
            </div>
            <div class="table-responsive"> 
              <table class="table table-hover margin-bottom-none" id="od">
                <thead>
                  <tr>
                    <th>Đơn hàng</th>
                    <th>Ngày mua</th>
                    
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td><span class="text-medium">{{$order->id}}</span></td>
                    <td>{{$order->created}}</td>
                     <td><span class="text-medium">{{number_format($order->total)}} VNĐ</span></td>
                    @if ($order->status==0)
                    <td><span class="text-danger">Chưa thanh toán</span></td>
                    <td>
                       <button type="submit" title="chi tiết" class="if btn btn-sm btn-success" data-id="{{$order->id}}"> Xem</button> 
                     @php
                       $now = date("Y/m/d H:i:s");
                       $check = date('Y/m/d H:i:s',strtotime('+24 hour',strtotime($order->created)));
                      
                     @endphp
                     @if ($now<$check)
                      
                    
                     <form style="display: inline-block;" action="{{ route('deleteorder') }}" method="post">
                       {{csrf_field()}}
                       <input type="hidden" name="id" value="{{$order->id}}">
                      <button type="submit" title="Hủy" onclick="return confirm('Hủy đơn hàng ?'); " class="delete btn btn-sm btn-danger"> Hủy</button>
                    </form> 
                     @endif 
                    </td>
                    @elseif($order->status==1 )
                     <td><span class="text-medium">Đã thanh toán</span></td>
                     <td>
                       <button type="submit" title="chi tiết" class="if btn btn-sm btn-success" data-id="{{$order->id}}"> Xem</button> 
                      </td>
                    @elseif($order->status==2 )
                     <td><span class="text-medium">Đã hủy</span></td>
                     <td>
                       <button type="submit" title="chi tiết" class="if btn btn-sm btn-success" data-id="{{$order->id}}"> Xem</button> 
                      </td>
                    @endif
                   
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$orders->links('')}}
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-detail">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Chi tiết đơn hàng</h4>
          </div>
          <div class="modal-body iff">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            
          </div>
        </div>
      </div>
    </div>
@endsection