@extends('admin.master')
@section('head')
 <title>Unishop-Trang quản trị</title>
 <meta content="" name="description" />
@endsection
@section('content')
   <div id="main-content" class="ecommerce_dashboard">
    <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Trang quản trị</strong></h3>
            </div>
            <div class="row m-t-20">
                <div class="col-md-24">
                    {{-- <div class="row">
                            
                       
                    </div> --}}
                    
                </div>
            </div>
              <div class="panel panel-default">
            <div class="panel-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <div class="head_table">
                        <div class="row">
                             <div class="col-md-6">
                    <div class="panel">
                        
                        <div class="panel-body">
                            <div class="row">
                                  <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-blue p-15">
                                    <div class="row m-b-6">
                                       
                                        <div class="col-xs-9">
                                            <small class="stat-title">Danh mục bài viết</small>
                                            <h1 class="m-0 w-500">{{$categorypost}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                               <div class="col-lg-6 col-md-12">
                                    <div class="panel no-bd bd-3 panel-stat">
                                        <div class="panel-body bg-blue p-15">
                                            <div class="row m-b-6">
                                               
                                                <div class="col-xs-9">
                                                    <small class="stat-title">Bài viết</small>
                                                    <h1 class="m-0 w-500">
                                                        <span class="animate-number" >{{$post_amount}}</span>
                                                    </h1>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                        <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-green p-15">
                                    <div class="row m-b-6">
                                        
                                        <div class="col-xs-9">
                                            <small class="stat-title">Danh mục sản phẩm</small>
                                            <h1 class="m-0 w-500">{{$category}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-green p-15">
                                    <div class="row m-b-6">
                                        
                                        <div class="col-xs-9">
                                            <small class="stat-title">Sản phẩm</small>
                                            <h1 class="m-0 w-500">{{$product_amount}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                       
                         
                        <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-red p-15">
                                    <div class="row m-b-6">
                                        
                                        <div class="col-xs-9">
                                            <small class="stat-title">Đơn hàng hôm nay</small>
                                            <h1 class="m-0 w-500">{{$odtd}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-red p-15">
                                    <div class="row m-b-6">
                                        
                                        <div class="col-xs-9">
                                            <small class="stat-title">Tổng đơn hàng</small>
                                            <h1 class="m-0 w-500">{{$order}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-dark p-15">
                                    <div class="row m-b-6">
                                        
                                        <div class="col-xs-9">
                                            <small class="stat-title">Nhân viên</small>
                                            <h1 class="m-0 w-500">{{$admin}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-12 ">
                            <div class="panel no-bd bd-3 panel-stat">
                                <div class="panel-body bg-dark p-15">
                                    <div class="row m-b-6">
                                        
                                        <div class="col-xs-9">
                                            <small class="stat-title">Khách hàng</small>
                                            <h1 class="m-0 w-500">{{$user}}</h1>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-top: 49px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Thông tin liên hệ</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form method="post" action="{{ route('about') }}">
                                        {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="form-label"><strong>Email</strong></label>
                                        
                                        <div class="controls">
                                            <input type="hidden" name="id" value="{{$about->id}}"/>
                                            <input type="email" name="email" value="{{$about->email}}" class="form-control">
                                            @if (count($errors) > 0)
                                            <span style="color: #a94442;margin-left: 100px;">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"><strong>Số điện thoại</strong>
                                        </label>
                                       
                                        <div class="controls">
                                            <input type="text" name="phone"  value="{{$about->phone}}"  class="form-control">
                                            @if (count($errors) > 0)
                                            <span style="color: #a94442;margin-left: 100px;">{{$errors->first('phone')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"><strong>Địa chỉ</strong>
                                        </label>
                                        
                                        <div class="controls">
                                            <input type="text" name="address"  value="{{$about->address}}" class="form-control">
                                             @if (count($errors) > 0)
                                            <span style="color: #a94442;margin-left: 100px;">{{$errors->first('address')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-danger ">Cập nhật</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
@section('script-upload')
    {{-- expr --}}
@endsection