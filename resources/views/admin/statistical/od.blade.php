@extends('admin.master')
@section('head')
<title>Unishop-Thống kê</title>
<meta content="" name="description" />
 
@endsection
@section('content')
 <div id="main-content" >
 <div class="m-b-20 clearfix">
  @php
                                 $tp = 0;
                                 if(isset(  $type))
                                   $tp= $type;
                                @endphp
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>@switch($tp)
             @case(3)
                 Đơn hàng chờ thanh toán 
                 @break
             @case(4)
                 Đơn hàng đã thanh toán
                 @break
              @case(5)
                 Đơn hàng đã hủy
              @break
         @endswitch
         ({{$count}} đơn hàng)</strong></h3>
          
      </div>
        <div class="page-title pull-right">
@php
  $param = Request::segments();

@endphp
     <h3 style="display: inline-block;"><a  href="{{ route('exportExecl',['start'=> $param[2],'end'=> $param[3],'type'=> $param[4]]) }}" class=" btn btn-success">Xuất execl</a></h3>

      <h3 style="display: inline-block;"><a  href="{{ route('statistical') }}" class=" btn btn-danger">Trở lại</a></h3>
    </div>
   <div class="row">

      <div class="col-md-12">

         <div class="panel panel-default">
            <div class="panel-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     

                     <table id="orders-table" class="table table-tools table-hover ">
                        <thead>
                           <tr>
                             
                              <th ><strong>ID</strong>
                              <th style="text-align: center;">Tên khách hàng</th>
                              <th class="text-center"><strong>Email</strong>
                              </th>
                             {{--  <th class="text-center"><strong>Giá gốc</strong>
                              </th>
                              <th><strong>Giảm giá</strong> --}}
                              </th>
                              <th style="text-align: center;"><strong>Ngày thêm</strong>
                              </th>
                              <th style="text-align:center"><strong>Tổng cộng</strong>
                              </th>
                              <th class="text-center"><strong>Trạng thái</strong>
                              </th>
                              <th class="text-center"><strong>Xác nhận bởi</strong>
                              </th>
                             
                           </tr>
                        </thead>
                        <tbody>
                           @isset ($orders)
                           @foreach ($orders as $order)
                           <tr>
                              

                              <td>{{$order->id}}</td>

                              <td>{{$order->name}}</td>
                              <td>{{$order->email}}</td>
                              <td class="color-success" style="text-align: center;">
                                 {{$order->created}}
                              </td>
                              <td class="color-success" style="text-align: center;">
                                 {{number_format($order->total)}} VNĐ
                              </td>
                              <td class="text-center">
                                 @if($order->status==0)
                                 <span class="label label-warning w-300">Chưa thanh toán</span>
                                 @elseif($order->status==1)
                                 <span class="label label-success w-300">Đã thanh toán</span>
                                 @else
                                  <span class="label label-danger w-300">Đã hủy</span>
                                  @endif
                              </td>
                              <td class="text-center">
                                 @if($order->create_by==0)
                                 <span class="label label-warning w-300">Chưa xác thực</span>
                                 @elseif($order->create_by==-1)
                                 <span class="label label-danger w-300">Hủy bởi người mua</span>
                                 @elseif($order->create_by>0 && $order->status==1)
                                  <span class="label label-success w-300">{{$order->nameAdmin($order->create_by)}}</span>
                                  @elseif($order->create_by>0 && $order->status==2)
                                  <span class="label label-danger w-300">{{$order->nameAdmin($order->create_by)}}</span>
                                  @endif
                              </td>
                         
                           </tr>
                           @endforeach
                            @endisset
                        </tbody>
                     </table>
                     @isset ($orders)
                       {{ $orders->links('vendor.pagination.bootstrap-4') }}   
                      @endisset 
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
   @endsection