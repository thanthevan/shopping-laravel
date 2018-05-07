@extends('admin.master')
@section('head')
<title>Unishop-Thống kê</title>
<meta content="" name="description" />
 <link href="  public/source/admin/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.time.css" rel="stylesheet">
@endsection
@section('content')
 <div id="main-content" class="ecommerce_dashboard">
 <div class="m-b-20 clearfix">
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>Thống kê</strong></h3>
          
      </div>
     
   </div>
            <div class="row m-b-40 m-t-10">
                <div class="col-md-12">
                    <div class="tabcordion">
                        <ul id="myTab" class="nav nav-tabs nav-dark">
                        	
                            <li class="active"><a class=" tkitem"  data-type="1" href="#products" data-toggle="tab">Sản phẩm nhập</a></li>
                            <li ><a class=" tkitem"  data-type="2" href="#orders" data-toggle="tab">Sản phẩm xuất</a></li>
                            <li ><a class=" tkitem"  data-type="3" href="#reviews" data-toggle="tab">Đơn hàng chờ thanh toán   </a></li>
                            <li ><a class=" tkitem"  data-type="4" href="#reviews" data-toggle="tab">Đơn hàng đã thanh toán   </a></li>
                            <li><a class=" tkitem"  data-type="5" href="#reviews" data-toggle="tab">Đơn hàng đã hủy   </a></li>
                            
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade  active in" id="products">
                             <div class="row">
                            	<form  method="get" role="form" id="tkkq" ">
                            		
                            	
                            		<div class="col-md-3 col-sm-3 col-xs-3">
                            		  <div class="form-group">
                                            <p><strong>Từ ngày</strong>
                                            </p>
                                            <input class="pickadate form-control" value="{{date('Y-m-d')}}"  id="start" type="text" placeholder="click chọn ngày" />
                                        </div>
                            	</div>
                            	<div class="col-md-3 col-sm-3 col-xs-3 ">
                            		<div class="form-group">
                                            <p><strong>Đến ngày</strong>
                                            </p>
                                            <input class="pickadate form-control" id="end"   value="{{date('Y-m-d')}}" type="text"  placeholder="click chọn ngày"/>
                                        </div>
                                    </div>
                            	<div class="col-md-4 col-sm-4 col-xs-4 " style="padding: 30px;">
                            		<div class="form-group">
                                    <input type="hidden"  id="kieu" value="1" >
                            		<button type="submit" class="btn btn-primary found">Tìm kiếm</button>
                                     </div></div>
                            	</form>
                            	</div>
                           </div>
                        
                    </div>
                </div>
            </div>
        </div>
@endsection