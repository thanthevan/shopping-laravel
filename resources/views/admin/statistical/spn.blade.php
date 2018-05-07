@extends('admin.master')
@section('head')
<title>Unishop-Thống kê</title>
<meta content="" name="description" />
 
@endsection
@section('content')
 <div id="main-content" >
 <div class="m-b-20 clearfix">
  
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>{{  $type==2?'Sản phẩm xuất':'Sản phẩm nhập'}} ({{$count}} sản phẩm)</strong></h3>
          
      </div>
      <div class="page-title pull-right">
@php
  $param = Request::segments();

@endphp
     <h3 style="display: inline-block;"><a  href="{{ route('exportExecl',['start'=> $param[2],'end'=> $param[3],'type'=> $param[4]]) }}" class=" btn btn-success">Xuất execl</a></h3>

      <h3 style="display: inline-block;"><a  href="{{ route('statistical') }}" class=" btn btn-danger">Trở lại</a></h3>
    </div>
       
   </div>
            <div class="row m-b-40 m-t-10">
                <div class="col-md-12">
                    <div class="tabcordion">
                        
                               <div class="row p-20">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
               <table  class="table table-tools table-hover ">
                        <thead>
                           <tr>
                              
                              <th style="min-width:70px"><strong>ID</strong>
                              <th><strong>Tên sản phẩm</strong>
                              </th>
                              <th class="text-center"><strong>Danh mục</strong>
                              </th>
                             {{--  <th class="text-center"><strong>Giá gốc</strong>
                              </th>
                              <th><strong>Giảm giá</strong> --}}
                              </th>
                              <th><strong>Ngày nhập</strong>
                              </th>
                              <th style="width:10%;text-align:center"><strong>Số lượng</strong>
                              </th>
                              <th class="text-center"><strong>Trạng thái</strong>
                              </th>
                              
                           </tr>
                        </thead>
                        <tbody>
                           @isset ($products)
                           @foreach ($products as $product)
                           <tr>
                             
                              <td>{{$product->id}}</td>
                              <td>{{$product->product_name}}</td>
                              <td>{{category_name($product->category_id)}}</td>
                             {{--  <td>{{$product->unit_price}} VNĐ</td>
                              <td style="text-align: center;"><strong >{{ empty($product->promo_price)?'-':$product->unit_price}}</strong></td> --}}
                              <td>{{$product->created}}</td>
                              <td class="color-success" style="text-align: center;">
                                
                                @if ( $type ==2)
                                  {{$product->countOrder($product->id)}}
                                @else
                                 {{$product->amount}}
                                 @endif
                              </td>
                              <td class="text-center">
                                 @if($product->status!=0)
                                 <span class="label label-success w-300">Online</span>
                                 @elseif($product->status==0)
                                 <span class="label label-danger w-300">Offline</span>
                                 @endif
                              </td>
                              
                           </tr>
                           @endforeach
                            @endisset
                        </tbody>
                     </table>
                      @isset ($products) {{ $products->links('vendor.pagination.bootstrap-4') }} @endisset
                                </div>
                            </div>
                            </div>
                         
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection