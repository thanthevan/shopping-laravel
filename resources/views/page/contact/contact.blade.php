@extends('page.layout')
@section('headmeta')
<title>Unishop | Liên hệ</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Thân Thế Văn">
@endsection
@section('content')
 <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Liên hệ/Phản hồi</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Liên hệ/Phản hồi</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x">
      	 <div class="row">
          <div class="col-md-7">
            <div class=" mb-30" style="font-size: 25px;">Mọi đóng góp ý kiến xin gửi về</div>
          </div>
          <div class="col-md-5">
            <ul class="list-icon">
            @foreach ($about as $infor)
           
              <li> <i class="icon-mail"></i><a class="navi-link" >{{$infor->email}}</a></li>
              <li> <i class="icon-bell"></i>{{$infor->phone}}</li>
              <li> <i class="icon-clock"></i>Trực tuyến 24/24</li>
               	{{-- expr --}}
            @endforeach
            </ul>
          </div>
        </div>
        <div class="row">
          <!-- Side Menu-->
          @php
          $email='';
          $name = '';
          	if(Auth::guard('web')->check()===true)
          		{
                     $email=Auth::guard('web')->user()->email;
                       $name =Auth::guard('web')->user()->name;
          		} 
          @endphp
          <!-- Content-->
          <div class="col-lg-12 col-md-12">
            @if (session('msg'))
					<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-ban"></i>&nbsp;&nbsp;<strong>Thông báo:</strong> {{session('msg')}}</div>

					@elseif(session('ms'))
						<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-check"></i>&nbsp;&nbsp;<strong>Thông báo:</strong> {{session('ms')}}</div>
					@endif 
            <form class="row" method="post" action="{{ route('fb') }}">
            	{{csrf_field()}}
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="help_name">Họ và Tên</label>
                  <input class="form-control form-control-rounded" type="text" id="help_name" name="name" value="{{$name}}" required>
                  @if (count($errors) > 0)
						<span style="color: red">{{$errors->first('name')}}</span>
				  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="help_email">Email</label>
                  <input class="form-control form-control-rounded" type="email" id="help_email" name="email"  value="{{$email}}" required>
                  @if (count($errors) > 0)
						<span style="color: red">{{$errors->first('email')}}</span>
				  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="help_category">Danh mục</label>
                  <select class="form-control form-control-rounded" id="help_category" name="title">
                    <option value="Phản hồi dịch vụ giao hàng">Phản hồi dịch vụ giao hàng</option>
                    <option value="Phản hồi chất lượng sản phẩm">Phản hồi chất lượng sản phẩm</option>
                    <option value="Góp ý">Góp ý</option>
                  </select>
                  @if (count($errors) > 0)
						<span style="color: red">{{$errors->first('title')}}</span>
				  @endif
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                	@if (count($errors) > 0)
						<span style="color: red">{{$errors->first('content')}}</span>
				  @endif
                  <label for="help_question">Phản hồi </label>
                  <textarea class="form-control form-control-rounded" id="help_question" rows="8" name="content" required></textarea>

                </div>
              </div>
              <div class="col-12 text-right">
                <button class="btn btn-outline-primary" type="submit">Gửi phản hồi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection