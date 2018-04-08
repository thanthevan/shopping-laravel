@extends('page.layout')
@section('headmeta')
<title>Unishop | Thành viên</title>
<meta name="description" content="home.blade.php">
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
				<h1>Đăng nhập / Đăng ký thành viên</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="index.html">Trang chủ</a>
					</li>
					<li class="separator">&nbsp;</li>
					<li>Đăng nhập / Đăng ký</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-2">
		<div class="row">
			<div class="col-md-6">
				<form class="login-box" method="post" action="{{ route('login-us') }}">
					{{csrf_field()}}
					<div class="row margin-bottom-1x">
						<div class="col-xl-6 col-md-8 col-sm-6"><a class="btn btn-sm btn-block facebook-btn" href="#"><i class="socicon-facebook"></i>&nbsp;Đăng nhập bằng Facebook</a></div>
						<div class="col-xl-6 col-md-8 col-sm-6"><a class="btn btn-sm btn-block google-btn" href="#"><i class="socicon-googleplus"></i>&nbsp;Đăng nhập bằng Google+</a></div>
					</div> 
					<h4 class="margin-bottom-1x">Đăng nhập</h4>
					@if (session('msg'))
					<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-ban"></i>&nbsp;&nbsp;<strong>Thông báo:</strong> {{session('msg')}}</div>
					@endif 
					<div class="form-group input-group">
						<input class="form-control" name="email" type="email" placeholder="Email" value="" required><span class="input-group-addon"><i class="icon-mail"></i></span>
						@if (count($errors) > 0)
						<span style="color: red">{{$errors->first('email')}}</span>
						@endif
					</div>
					<div class="form-group input-group">
						<input class="form-control" name="password" type="password" placeholder="Mật khẩu"  value="" required><span class="input-group-addon"><i class="icon-lock"></i></span>
						@if (count($errors) > 0)
						<span style="color: red">{{$errors->first('password')}}</span>
						@endif
					</div>
					<div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
						<label class="custom-control custom-checkbox">
							<input class="custom-control-input" name="remember" type="checkbox" checked><span class="custom-control-indicator"></span><span class="custom-control-description">Ghi nhớ</span>
						</label><a class="navi-link" href="#">Quên mật khẩu?</a>
					</div>

					<div class="text-center text-sm-right">
						<button class="btn btn-primary margin-bottom-none" type="submit">Đăng nhập</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="padding-top-3x hidden-md-up"></div>
				<h3 class="margin-bottom-1x">Không có tài khoản? Đăng ký</h3>
				<p>Đăng ký làm thành viên để nhận nhiều ưu đãi hơn!</p>
				<form class="row" method="post">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-fn">Họ và tên</label>
							<input class="form-control" type="text" id="reg-fn" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-email">E-mail</label>
							<input class="form-control" type="email" id="reg-email" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-phone">Số điện thoại</label>
							<input class="form-control" type="text" id="reg-phone" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-address">Địa chỉ</label>
							<input class="form-control" type="text" id="reg-address" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-pass">Mật khẩu</label>
							<input class="form-control" type="password" id="reg-pass" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-pass-confirm">Nhập lại mật khẩu</label>
							<input class="form-control" type="password" id="reg-pass-confirm" required>
						</div>
					</div>
					<div class="g-recaptcha"  data-sitekey="6LdqnUsUAAAAAG_dp_iwv2VFOQgABrEHFl4tUPgJ"></div>
					<div class="col-12 text-center text-sm-right">
						<button class="btn btn-primary margin-bottom-none" type="submit">Đăng ký</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection