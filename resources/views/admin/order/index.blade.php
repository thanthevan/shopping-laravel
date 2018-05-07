@extends('admin.master')
@section('head')
<title>Unishop-Hóa đơn</title>
<meta content="" name="description" />
<link rel="stylesheet" href="public/source/admin/plugins/dropzone/dropzone.css">
<meta content="" name="description" />
<style type="text/css">
    
    .modal-custom{
        width: 84%;
    }
</style>
@endsection 
@section('content')

  <div id="main-content">
   <div id="main-content" data-page="posts">
   <div class="m-b-20 clearfix">
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>Danh sách đơn hàng</strong></h3>
          @if (count($errors) > 0)
            {{ "<script> alert(".$errors->first('file').")</script>"}}
          @endif
      </div>
     {{--  <div class="pull-right">
                <a href="javascript:void(0)" onclick="return confirm('Bạn muốn hủy những đơn hàng đã chọn ?');" class="btn btn-danger m-t-10"><i class="fa fa-times-circle p-r-10"></i>Hủy </a>
      </div> --}}
      {{-- <div class="pull-right" style="margin-right: 5px;">
         <a  href='javascript:void(0)' onclick="return confirm('Bạn muốn xác nhận thanh toán những đơn hàng đã chọn ?');"  class="btn btn-success m-t-10"><i class=" fa fa-check p-r-10"></i>Thanh toán</a>
      </div> --}}
   </div>
   <div class="row">

      <div class="col-md-12">

         <div class="panel panel-default">
            <div class="panel-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <div class="head_table">
                        <div class="row">
                         <div  class="col-md-2">
                            <select class="form-control" title="Chọn danh mục" name="category_order" id="filter-status-order" required>
                              <option selected disabled>Lọc tình trạng</option>
                              <option value="0" >Đợi thanh toán</option>
                              <option value="1" >Đã thanh toán</option>
                              <option value="2" >Đã hủy</option>
                              
                           </select>
                         </div>
                       {{--   <div class="col-md-2">
                           <div id="posts-table_filter" class="dataTables_filter"><label><input type="search" class="form-control" aria-controls="posts-table" placeholder="Tìm kiếm đơn hàng..."></label>
                           </div>
                        </div> --}}
                        </div>
                    </div>

                     <table id="orders-table" class="table table-tools table-hover ">
                        <thead>
                           <tr>
                              {{-- <th style="min-width:50px">
                                 <div class="checkbox" style="min-height: 0px;padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
                                    <label>
                                     <input type="checkbox" class="check_all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    </label>
                                 </div>
                              </th> --}}
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
                              <th class="text-center"><strong>Thao tác</strong>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           @isset ($orders)
                           @foreach ($orders as $order)
                           <tr>
                              {{-- <td>
                                  <div class="checkbox" style="min-height: 0px;padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
                                    <label>
                                     <input type="checkbox" value="{{$order->id}}">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    </label>
                                 </div>
                              </td> --}}

                              <td>{{$order->id}}</td>

                              <td >{{$order->name}}</td>
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
                              <td class="text-center " >
                                 @if($order->status==0)
                                 <button title="xem"  class="edit btn btn-sm btn-info info-order" data-id="{{$order->id}}"><i class="fa fa-eye"></i></button>
                                 <form style="display: inline-block;" action="{{ route('order.update',['id'=>$order->id]) }}" method="post">
                                       {{csrf_field()}}
                                       {{method_field('PUT')}}
                                       <input type="hidden" name="status" value="1"> 
                                        <button type="submit" title="Thanh toán" onclick="return confirm('Xác nhận thanh toán đơn hàng này ?'); " class="edit btn btn-sm btn-success"><i class="fa fa-check"></i></button></form>
                                  <form style="display: inline-block;" action="{{ route('order.update',['id'=>$order->id]) }}" method="post">
                                       {{csrf_field()}}
                                       {{method_field('PUT')}}
                                       <input type="hidden" name="status" value="2"> 
                                        <button type="submit" title="Hủy" onclick="return confirm('Hủy đơn hàng này ?'); " class="delete btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></button></form>
                                 @elseif($order->status==1)
                                  <button  class="edit btn btn-sm btn-info info-order" data-id="{{$order->id}}" title="xem"><i class="fa fa-eye"></i></button>
                                  <form style="display: inline-block;" action="{{ route('order.update',['id'=>$order->id]) }}" method="post">
                                       {{csrf_field()}}
                                       {{method_field('PUT')}}
                                       <input type="hidden" name="status" value="2"> 
                                        <button type="submit" title="Hủy" onclick="return confirm('Hủy đơn hàng này ?'); " class="delete btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></button></form>
                                 @else
                                   <button title="xem"  class="edit btn btn-sm btn-info info-order" data-id="{{$order->id}}"><i class="fa fa-eye"></i></button>
                                 <form style="display: inline-block;" action="{{ route('order.update',['id'=>$order->id]) }}" method="post">
                                       {{csrf_field()}}
                                       {{method_field('PUT')}}
                                       <input type="hidden" name="status" value="1"> 
                                        <button type="submit" title="Thanh toán" onclick="return confirm('Xác nhận thanh toán đơn hàng này ?'); " class="edit btn btn-sm btn-success"><i class="fa fa-check"></i></button></form>
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

<div class="modal fade" id="modal-detai-order">
    <div class="modal-dialog modal-custom">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Chi tiết đơn hàng</h4>
            </div>
            <div class="modal-body order-detail">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('select')
<script src="public/source/admin/plugins/bootstrap-select/bootstrap-select.js"></script>
@endsection
@section('script-upload')
  <script type="text/javascript">
   $(function() {
      $('input:checkbox').on('click', function () {
       if ($(this).prop('checked') ==  true){
            $(this).prop('checked', true);
            $(this).parent().parent().parent().addClass('selected');
        } else {
            $(this).prop('checked', false);
            $(this).parent().parent().parent().removeClass('selected');
        }
    });
        $('.check_all').on('click', function () {
       if ($(this).prop('checked') ==  true){
            $(this).closest('table').find('input:checkbox').prop('checked', true);
            $(this).closest('table').find('tr').addClass('selected');
        } else {
            $(this).closest('table').find('input:checkbox').prop('checked', false);
            $(this).closest('table').find('tr').removeClass('selected');
        }
    });
   });

    $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
       });

   $('.info-order').each(function() {

    $(this).click(function() {
        id =  $(this).attr('data-id');
         
          $.get("cp_admin/order/"+id, function(data) {

              $('.order-detail').html('');
              $('.order-detail').html(data);
              $('#modal-detai-order').modal('show');

          });
     
        
    });
       
   });

   $('#filter-status-order').on('change', function(event) {
     event.preventDefault();
       status=   $(this).val();
       window.location.assign('cp_admin/loc-hoa-don/'+status);
   });

</script>
@endsection