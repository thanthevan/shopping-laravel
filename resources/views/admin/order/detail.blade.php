<style type="text/css">
 .breeding-rhombus-spinner {
      height: 65px;
      width: 65px;
      position: relative;
      transform: rotate(45deg);
    }

    .breeding-rhombus-spinner, .breeding-rhombus-spinner * {
      box-sizing: border-box;
    }

    .breeding-rhombus-spinner .rhombus {
      height: calc(65px / 7.5);
      width: calc(65px / 7.5);
      animation-duration: 2000ms;
      top: calc(65px / 2.3077);
      left: calc(65px / 2.3077);
      background-color: #f243fe;
      position: absolute;
      animation-iteration-count: infinite;
    }

    .breeding-rhombus-spinner .rhombus:nth-child(2n+0) {
       margin-right: 0;
     }

    .breeding-rhombus-spinner .rhombus.child-1 {
      animation-name: breeding-rhombus-spinner-animation-child-1;
      animation-delay: calc(100ms * 1);
    }

    .breeding-rhombus-spinner .rhombus.child-2 {
      animation-name: breeding-rhombus-spinner-animation-child-2;
      animation-delay: calc(100ms * 2);
    }

    .breeding-rhombus-spinner .rhombus.child-3 {
      animation-name: breeding-rhombus-spinner-animation-child-3;
      animation-delay: calc(100ms * 3);
    }

    .breeding-rhombus-spinner .rhombus.child-4 {
      animation-name: breeding-rhombus-spinner-animation-child-4;
      animation-delay: calc(100ms * 4);
    }

    .breeding-rhombus-spinner .rhombus.child-5 {
      animation-name: breeding-rhombus-spinner-animation-child-5;
      animation-delay: calc(100ms * 5);
    }

    .breeding-rhombus-spinner .rhombus.child-6 {
      animation-name: breeding-rhombus-spinner-animation-child-6;
      animation-delay: calc(100ms * 6);
    }

    .breeding-rhombus-spinner .rhombus.child-7 {
      animation-name: breeding-rhombus-spinner-animation-child-7;
      animation-delay: calc(100ms * 7);
    }

    .breeding-rhombus-spinner .rhombus.child-8 {
      animation-name: breeding-rhombus-spinner-animation-child-8;
      animation-delay: calc(100ms * 8);
    }

    .breeding-rhombus-spinner .rhombus.big {
      height: calc(65px / 3);
      width: calc(65px / 3);
      animation-duration: 2000ms;
      top: calc(65px / 3);
      left: calc(65px / 3);
      background-color: #f243fe;
      animation: breeding-rhombus-spinner-animation-child-big 2s infinite;
      animation-delay: 0.5s;
    }


    @keyframes breeding-rhombus-spinner-animation-child-1 {
      50% {
        transform: translate(-325%, -325%);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-2 {
      50% {
        transform: translate(0, -325%);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-3 {
      50% {
        transform: translate(325%, -325%);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-4 {
      50% {
        transform: translate(325%, 0);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-5 {
      50% {
        transform: translate(325%, 325%);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-6 {
      50% {
        transform: translate(0, 325%);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-7 {
      50% {
        transform: translate(-325%, 325%);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-8 {
      50% {
        transform: translate(-325%, 0);
      }
    }

    @keyframes breeding-rhombus-spinner-animation-child-big {
      50% {
        transform: scale(0.5);
      }
    }
    .loading{
        width: 60px;
       margin: 0 auto;
        padding: 100px;
    }
</style>
<div class="loading">
    <div class="breeding-rhombus-spinner">
    <div class="rhombus child-1"></div>
    <div class="rhombus child-2"></div>
    <div class="rhombus child-3"></div>
    <div class="rhombus child-4"></div>
    <div class="rhombus child-5"></div>
    <div class="rhombus child-6"></div>
    <div class="rhombus child-7"></div>
    <div class="rhombus child-8"></div>
    <div class="rhombus big"></div>
  </div>
</div>
<div class="tabcordion" style="display: none">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#order_resume" data-toggle="tab">Đơn hàng</a></li>
                            <li><a href="#order_details" data-toggle="tab">Chi tiết đơn hàng</a></li>
                            <li><a href="#customer_details" data-toggle="tab">Thông tin khách hàng</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="order_resume">
                                <div class="row p-20">
                                    <div class="col-md-6">
                                        <h3 class="m-t-0 m-b-20">Đơn hàng </h3>
                                        <form class="form-horizontal p-20">
                                            <div class="form-group">
                                                <div class=" col-sm-4">Order ID:
                                                </div>
                                                <div class=" col-sm-5">
                                                    <strong>{{$order->id}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Ngày gửi:
                                                </div>
                                                <div class=" col-sm-5">
                                                    <strong>{{$order->created}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Khách hàng:
                                                </div>
                                                <div class=" col-sm-5">
                                                    @isset ($user)
                                                      <strong>{{$user->name}}</strong>  
                                                    @endisset
                                                    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <div class=" col-sm-4">Số lượng sản phẩm:
                                                </div>
                                                @php
                                                  $s=0;
                                                  foreach ($orderdetails as  $value) {
                                                     $s+=$value->amount;
                                                  }
                                                @endphp
                                        
                                                <div class=" col-sm-5">
                                                    <strong>{{$s}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Tổng cộng:
                                                </div>
                                                <div class=" col-sm-5">
                                                    <strong>{{number_format($order->total)}} VNĐ</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Trạng thái:
                                                </div>
                                               
                                                <div class=" col-sm-5">
                                                     @if($order->status==1)
                                                    <strong>Đã thanh toán</strong>
                                                    @elseif($order->status==0)
                                                     <strong>Chưa thanh toán</strong>
                                                    @else
                                                    <strong>Đã hủy</strong>
                                                    @endif
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="m-t-0 m-b-20">Thông tin khác</h3>
                                        <form class="form-horizontal p-20">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    Địa chỉ nhận:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{$order->address}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    Ghi chú:
                                                </div>
                                                <div class="col-sm-8 c-red">
                                                    <strong></strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    Hình thức giao hàng:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>Ship</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    Hình thức thanh toán:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{$order->payment}}</strong>
                                                </div>
                                            </div>
                                        @if ($order->status!=2)
                                          <div class="form-group m-t-60">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <a class="btn btn-block btn-primary" href="{{ route('invoice',['id'=>$order->id]) }}">Xem hóa đơn</a>
                                                </div>
                                            </div>
                                        @endif
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="order_details">
                                <div class="row p-10">
                                    <div class="col-md-12">
                                        <table id="products-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th style="min-width:70px"><strong>ID</strong>
                                                    <th><strong>Tên sản phẩm</strong>
                                                    </th>
                                                    <th><strong>Danh mục</strong>
                                                    </th>
                                                    <th><strong>Đơn giá</strong>
                                                    </th>
                                                    <th><strong>Số lượng</strong>
                                                    </th>
                                                    <th><strong>Tổng cộng</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total=0;
                                                @endphp
                                               @isset ($orderdetails)
                                                   
                                               
                                                @foreach ($orderdetails as $orderdetail)
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{$orderdetail->product_name}}</td>
                                                    <td>{{category_name_by_pi($orderdetail->product_id)}}</td>
                                                    <td>{{number_format(unit_price($orderdetail->product_id))}} VNĐ</td>
                                                    <td>{{$orderdetail->amount}}</td>
                                                    
                                                    <td>{{number_format(unit_price($orderdetail->product_id)*$orderdetail->amount)}} VNĐ</td>
                                                </tr>
                                                @php
                                                    $total+=unit_price($orderdetail->product_id)*$orderdetail->amount;
                                                @endphp
                                        @endforeach
                                        @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row p-10">
                                    <div class="col-md-12">
                                        <div class="col-md-5 col-md-offset-3">
                                            <div class="well">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="glyph-icon flaticon-shopping80 f-80"></i>
                                                    </div>
                                                    <div class="col-md-7">
                                                        
                                                        <div class="row align-right m-b-10">
                                                            <div class="col-md-5">
                                                                Tổng số lượng:
                                                            </div>
                                                            <div class="col-md-6 w-600">
                                                                {{ $orderdetails->count()}} sản phẩm
                                                            </div>
                                                        </div>
                                                        <div class="row align-right m-b-10">
                                                            <div class="col-md-5">
                                                                 Tổng cộng:
                                                            </div>
                                                            <div class="col-md-6 w-600">
                                                               {{number_format($total)}} VNĐ
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="customer_details">
                                <div class="row p-20">
                                    <div class="col-md-12">
                                        <form class="form-horizontal">
                                        @isset ($user)
                                            
                                        
                                            <div class="col-md-6">
                                                <h3 class="m-t-0 m-b-20">Thông tin khách hàng</h3>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Họ và tên:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$user->name}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Địa chỉ:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$user->address}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Số điện thoại:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$user->phone}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Email:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$user->email}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Mua hàng:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>Đã mua {{$cb}} đơn hàng</strong>
                                                    </div>
                                                </div>
                                            </div>
                                              @endisset
                                             
                                            <div class="col-md-6">
                                                <h3 class="m-t-0 m-b-20">Thông tin nhận hàng</h3>
                                              <div class="form-group">
                                                    <div class="col-sm-4">Họ và tên:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$order->name}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Địa chỉ:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$order->address}}</strong>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <div class="col-sm-4">Số điện thoại:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$order->phone}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Email:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$order->email}}</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Ghi chú:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>{{$order->note}}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
<script type="text/javascript">
    setTimeout(function() {
        $('.loading').fadeOut(400,function(){

            $('.tabcordion').fadeIn(200);
        });

    },3000);
</script>