@extends('admin.master')
@section('head')
<title>Unishop-Nhân viên</title>
<meta content="" name="description" />
@endsection
@section('content')
<div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h2>Nhân viên <small>Danh sách</small></h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" id="member-finder" class="form-control" placeholder="Nhập tên,email,số điện thoại...">
                                </div>
                                <div class="col-md-8 align-right m-t-10">
                                    <span class="c-gray m-r-20">Filter by
                                        <a href="#" class="m-l-10 m-r-5">Date</a> 
                                        <span class="c-gray-light">/</span> 
                                        <a href="#" class="m-l-5 m-r-5">Name</a> 
                                        <span class="c-gray-light">/</span> 
                                        <a href="#" class="c-blue m-l-5">City</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            	@isset ($users)
                            	@foreach ($users as $user)
                            	 <div class="col-md-4 member-entry">
                                    <div class="row member">
                                        <div class="col-xs-3">
                                            <img src="public/source/admin/img/avatars/avatar1_big.png" alt="avatar 1" class="pull-left img-responsive">
                                        </div>
                                        <div class="col-xs-9">
                                            <h3 class="m-t-0 member-name"><strong>{{$user->name}}</strong></h3>
                                            <div class="pull-left">
                                                <p><i class="fa fa-envelope-o c-gray-light p-r-10"></i> {{$user->email}}</p>
                                                <p><i class="fa fa-phone c-gray-light p-r-10"></i> {{$user->phone}}</p>
                                            </div>
                                            <div class="pull-right align-right">
                                                {{-- <p><i class="fa fa-calendar c-gray-light p-r-10"></i> {{$user->birthday}}</p>
                                                <p><i class="fa fa-map-marker c-gray-light p-r-10"></i> {{$user->address}}</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            	@endforeach
                            	  
                            	@endisset
                                
                            </div>
                            <div class="m-t-30 align-center">
                              @isset ($users)
                                   {{$users->links('vendor.pagination.bootstrap-4')}}
                              @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection 