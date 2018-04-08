@extends('page.layout')
@section('headmeta')
<title>Unishop | Thành viên-Thông tin</title>
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
            <h1>Thông tin cá nhân</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="{{ route('infouser') }}">Người dùng</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Thông tin cá nhân</li>
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
            	<a class="list-group-item justify-content-between" href="{{ route('infoorder') }}"><span><i class="icon-bag"></i>Danh sách sản phẩm đã mua</span><span class="badge badge-primary badge-pill">6</span></a>
            	<a class="list-group-item active" href="{{ route('infouser') }}"><i class="icon-head"></i>Thông tin cá nhân</a>
            </nav>
          </div>
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <form class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-fn">Họ và Tên</label>
                  <input class="form-control" type="text" id="account-fn" value="{{Auth::user()->name}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-ln">Ngày sinh</label>
                  <input class="form-control" type="text" id="account-ln" value="{{Auth::user()->birthday}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-email">E-mail</label>
                  <input class="form-control" type="email" id="account-email" value="{{Auth::user()->email}}" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-phone">Số điện thoại</label>
                  <input class="form-control" type="text" id="account-phone" value="{{Auth::user()->phone}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-pass">Mật khẩu mới</label>
                  <input class="form-control" type="password" id="account-pass">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-confirm-pass">Nhập lại mật khẩu</label>
                  <input class="form-control" type="password" id="account-confirm-pass">
                </div>
              </div>
              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                  <button class="btn btn-primary margin-right-none" type="button" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Cập nhật thông tin</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>	
@endsection