@extends('page.layout')
@section('headmeta')
<title>Unishop | 404 not found</title>
<meta name="description" content="Chuyên bán ,cung cấp các loại quần áo">
<meta name="keywords" content="">
<meta name="author" content="ttv">
@endsection
@section('content')

  <div class="offcanvas-wrapper">
      <!-- Page Content-->
      <div class="container padding-top-3x padding-bottom-3x mb-1"><img class="d-block m-auto" src="public/source/page/img/404_art.jpg" style="width: 100%; max-width: 550px;" alt="404">
        <div class="padding-top-1x mt-2 text-center">
          <h3>Không tìm thấy trang</h3>
          <p>Không tìm thấy trang mà bạn yêu cầu. <a href="{{ route('home') }}">Quay lại trang chủ</a><br>Hoặc tìm kiếm lại.</p>
        </div>
      </div>
     
    </div>
  @endsection