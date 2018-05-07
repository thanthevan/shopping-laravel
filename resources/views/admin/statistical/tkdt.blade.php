@extends('admin.master')
@section('head')
<title>Unishop-Thống kê</title>
<meta content="" name="description" />
 {{-- <link href="  public/source/admin/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.time.css" rel="stylesheet"> --}}
@endsection
@section('content')
 <div id="main-content" class="ecommerce_dashboard">
 <div class="m-b-20 clearfix">
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>Thống kê doanh thu</strong></h3>
          
      </div>
     
   </div>
            <div class="row m-b-40 m-t-10">
                <div class="col-md-12">
                    <div class="tabcordion">
                        <ul id="myTab" class="nav nav-tabs nav-dark">
                        	
                            <li class="active"><a class=" tkitem"  data-type="1" href="#products" data-toggle="tab">Doanh thu</a></li>
                            
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade  active in" id="products">
                             <div class="row">
                            <form  method="post" role="form"  action="{{ route('revenueData') }}">
                                   {{csrf_field()}}
                                   <div class="col-md-1 col-sm-1 col-xs-1 " style="padding: 30px;">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Xem</button>
                                     </div>
                                 </div>
                                   <div class="col-md-3 col-sm-3 col-xs-3 ">
                                    <div class="form-group">
                                            <p><strong>Loại</strong>
                                            </p>
                                             <select name="type" id="typedt" class="form-control" required="">
                                                  <option value="" selected>Chọn loại </option>
                                                 <option value="month">Theo tháng</option>
                                                 <option value="year">Theo năm</option>
                                             </select>
                                        </div>
                                    </div>
                            	<div id="timedt" style="display: none">
                            	<div class="col-md-3 col-sm-3 col-xs-3 ">
                            		<div class="form-group">
                                            <p><strong>Nhập năm</strong>
                                            </p>
                                            <input style="line-height: 10px" class=" form-control"  id="end"  name="year1"  value="" type="text" />
                                        </div>
                                    </div>
                                    </div>
                                    <div>
                                        <div id="monthtk" style="display: none">
                                             <div class="col-md-2 col-sm-2 col-xs-2 ">
                                    <div class="form-group">
                                            <p><strong>Nhập năm</strong>
                                            </p>
                                            <input style="line-height: 10px"  class=" form-control" id="end"  name="year2"  value="" type="text" />
                                        </div>
                                    </div>
                                          <div class="col-md-2 col-sm-2 col-xs-2 ">
                                    <div class="form-group">
                                            <p><strong>Chọn tháng</strong>
                                            </p>
                                            <select name="month"  class="form-control" >
                                                @for ($i = 1; $i <=12 ; $i++)
                                                    <option value="{{$i}}">Tháng {{$i}}</option>
                                                @endfor
                                               
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                                    </div>
                            </form>
                            	</div>
                           </div>
                         
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded',function() {
                document.getElementById('typedt').onchange=changedata;},false);
            function changedata(event) {
                
                if(event.target.value =='year')
                {
                     document.getElementById("timedt").style.display = "block";
                    
                      document.getElementById("monthtk").style.display = "none";
                
                 }else if(event.target.value =='month'){
                    
                     document.getElementById("timedt").style.display = "none";
                      document.getElementById("monthtk").style.display = "block";
                 }
               
            }
        </script>
@endsection