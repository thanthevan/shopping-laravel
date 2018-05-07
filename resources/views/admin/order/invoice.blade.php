@extends('admin.master')
@section('head')
<title>Unishop-Hóa đơn</title>
<meta content="" name="description" />
<link rel="stylesheet" href="public/source/admin/plugins/dropzone/dropzone.css">
<meta content="" name="description" />
<style type="text/css">
    
 .t-ct{
    text-align: center;
 }
</style>
@endsection
@section('content')
  <div id="main-content">
            <div class="m-t-10 m-b-10 no-print"> 
                
                <button type="button" class="btn btn-white m-r-10 m-b-10" onclick="window.print();"><i class="fa fa-print m-r-10"></i>In hóa đơn</button>               
               {{--  <button type="button" class="btn btn-white m-r-10 m-b-10"><i class="fa fa-envelope m-r-10"></i> Gửi qua email</button> --}}
            </div>




            <div class="row invoice-page">
                <div class="col-md-12 p-t-0">
                    <div class="invoice panel panel-default p-40">
                        <div class="panel-body p-t-0">
                            <div class="row">
                                <div class="col-md-12 align-center">
                                     <h4>Hóa đơn thanh toán</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h4 class="w-500 c-gray">Bên gửi</h4>
                                        <img src="public/source/page/img/logo/logo.png" class="img-responsive0" alt="themeforest" style="margin-bottom: 10px;">
                                        <address>
                                            <div >Địa chỉ: 92 Đại La, Trương Định, Hai Bà Trưng, Hà Nội</div><br>
                                            Số điện thoại: 0869249714
                                        </address>
                                    </div>
                                    <div class="pull-right">
                                        <h4 class="w-500 c-gray">Bên nhận</h4>
                                        <address>
                                            <strong><textarea class="width-300">{{$order->name}}</textarea></strong><br>
                                            <div >Địa chỉ: {{$order->address}}</div><br>
                                            Số điện thoại: {{$order->phone}}
                                        </address> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 m-t-20 m-b-20">
                                            <p><strong>Ngày đặt hàng: </strong> {{$order->created}}</p>
                                            
                                            
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th class=" t-ct">Sản phẩm</th>
                                                <th  class="t-ct">Màu</th>
                                                <th  class="t-ct">Size</th>
                                                <th  class="t-ct">Đơn giá</th>
                                                <th  class="text-center">Số lượng</th>
                                                <th  class="t-ct">Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderdetails as $dt)
                                            <tr class="item-row">
                                               
                                                <td><div class="text-primary t-ct"><strong>{{$dt->product_name}}</strong></div></td>  
                                                <td  class="t-ct"><div >Màu: {{$dt->color}}</div></td>
                                                <td  class="t-ct"><div >Size: {{$dt->size}}</div></td>                    
                                                <td class="t-ct ">
                                                        {{number_format(unit_price($dt->product_id))}} VNĐ 
                                                </td>
                                                 <td  class="t-ct ">{{$dt->amount}}</td>
                                                <td class="t-ct ">{{number_format(unit_price($dt->product_id)*$dt->amount)}} VNĐ</td>
                                            </tr>

                                            @endforeach
                                            </tr>
                                             <tr style="height: 50px;"></tr>
                                            <tr >
                                                <td colspan="4" rowspan="4" style="margin-top: 20px"></td>
                                                <td class="text-left"><strong>Tạm tính</strong></td>
                                                <td class="text-center" id="subtotal"><strong>{{number_format($order->total)}} VNĐ</strong></td>
                                            </tr>

                                            <tr>
                                                <td class="text-left no-border"><strong>phí ship</strong></td>
                                                <td class="text-center" > 
                                                    <strong>0 VNĐ</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left no-border"><strong>VAT</strong></td>
                                                <td class="text-center"><strong>Đã tính trong đơn giá</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left no-border"><div><strong>Tổng cộng</strong></div></td>
                                                <td class="text-center" id="total"><strong>{{number_format($order->total)}} VNĐ</strong></td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                    <div class="well" style="text-align: center;margin-top:100px;padding:10px;margin-bottom:10px;">
                                        Cảm ơn quý khách đã mua hàng tại <strong>Unishop</strong>.Mọi phản hồi xin gửi qua <strong>Unishopsupport@gmail.com</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 
        </div>
@endsection