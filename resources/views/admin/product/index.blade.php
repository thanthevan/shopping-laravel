@extends('admin.master')
@section('head')
<title>Unishop-Sản phẩm</title>
<meta content="" name="description" />
<link rel="stylesheet" href="public/source/admin/plugins/dropzone/dropzone.css">
<meta content="" name="description" />
<style type="text/css">
.wait{
   width: 200px;height: 200px; background: white;padding:200px;
}
   .dropzone {
   border: 2px dashed #0087F7;
   background: white;
   border-radius: 5px;
   min-height: 300px;
   padding: 90px 0;
   vertical-align: baseline;
   text-align: center;
   }
   .js .inputfile {
   width: 0.1px;
   height: 0.1px;
   opacity: 0;
   overflow: hidden;
   position: absolute;
   z-index: -1;
   }
   .inputfile+label {
   max-width: 80%;
   font-size: 1.25rem;
   /* 20px */
   font-weight: 700;
   text-overflow: ellipsis;
   white-space: nowrap;
   cursor: pointer;
   display: inline-block;
   overflow: hidden;
   padding: 0.625rem 1.25rem;
   /* 10px 20px */
   }
   .no-js .inputfile+label {
   display: none;
   }
   .inputfile:focus+label,
   .inputfile.has-focus+label {
   outline: 1px dotted #000;
   outline: -webkit-focus-ring-color auto 5px;
   }
   .inputfile+label * {
   /* pointer-events: none; */
   /* in case of FastClick lib use */
   }
   .inputfile+label svg {
   width: 1em;
   height: 1em;
   vertical-align: middle;
   fill: currentColor;
   margin-top: -0.25em;
   /* 4px */
   margin-right: 0.25em;
   /* 4px */
   }
   /* style 1 */
   .inputfile-1+label {
   color: #f1e5e6;
   background-color: #0489f7;
   }
   .inputfile-1:focus+label,
   .inputfile-1.has-focus+label,
   .inputfile-1+label:hover {
   background-color: #05457a;

   }
   .head_table{
    margin-bottom: 5px;
    border-bottom: 1.5px solid #e7e7e7;
   }
</style>
@endsection
@section('content')
<div id="main-content" data-page="posts">
   <div class="m-b-20 clearfix">
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>Danh sách sản phẩm</strong></h3>
          @if (count($errors) > 0)
            {{ "<script> alert(".$errors->first('file').")</script>"}}
          @endif
      </div>
      <div class="pull-right">
                <a href="javascript:void(0)" onclick="return confirm('Bạn muốn xóa những sản phẩm đã chọn ?');" class="btn btn-danger m-t-10"><i class="fa fa-times-circle p-r-10"></i>Xóa sản phẩm</a>
      </div>

      <div class="pull-right">
         <a href="#modal-excel" data-toggle="modal" class="btn btn-success m-t-10" style="margin-right: 5px;"><i class="fa fa-plus p-r-10"></i>Thêm bằng file excel</a>
      </div>
      <div class="pull-right" style="margin-right: 5px;">
         <a data-toggle="modal" href='#modal-id' class="btn btn-success m-t-10"><i class="fa fa-plus p-r-10"></i>Thêm mới</a>
      </div>
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
                            <select class="form-control" title="Chọn danh mục" name="category_product" required>
                              <option selected disabled>Lọc danh mục</option>
                               @php
                                 category($category,0,null,0);
                               @endphp
                           </select>
                         </div>
                         <div class="col-md-2">
                           <div id="posts-table_filter" class="dataTables_filter"><label><input type="search" class="form-control" aria-controls="posts-table" placeholder="Tìm kiếm sản phẩm..."></label>
                           </div>
                        </div>
                        </div>
                    </div>

                     <table id="products-table" class="table table-tools table-hover ">
                        <thead>
                           <tr>
                              <th style="min-width:50px">
                                 <div class="checkbox" style="min-height: 0px;padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
                                    <label>
                                     <input type="checkbox" class="check_all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    </label>
                                 </div>
                              </th>
                              <th style="min-width:70px"><strong>ID</strong>
                              <th><strong>Tên sản phẩm</strong>
                              </th>
                              <th class="text-center"><strong>Danh mục</strong>
                              </th>
                             {{--  <th class="text-center"><strong>Giá gốc</strong>
                              </th>
                              <th><strong>Giảm giá</strong> --}}
                              </th>
                              <th><strong>Ngày thêm</strong>
                              </th>
                              <th style="width:10%;text-align:center"><strong>Số lượng</strong>
                              </th>
                              <th class="text-center"><strong>Trạng thái</strong>
                              </th>
                              <th class="text-center"><strong>Thao tác</strong>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           @isset ($products)
                           @foreach ($products as $product)
                           <tr>
                              <td>
                                  <div class="checkbox" style="min-height: 0px;padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
                                    <label>
                                     <input type="checkbox" value="{{$product->product_id}}">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    </label>
                                 </div>
                              </td>
                              <td>{{$product->id}}</td>
                              <td>{{$product->product_name}}</td>
                              <td>{{category_name($product->category_id)}}</td>
                             {{--  <td>{{$product->unit_price}} VNĐ</td>
                              <td style="text-align: center;"><strong >{{ empty($product->promo_price)?'-':$product->unit_price}}</strong></td> --}}
                              <td>{{$product->created}}</td>
                              <td class="color-success" style="text-align: center;">
                                 {{$product->amount}}
                              </td>
                              <td class="text-center">
                                 @if($product->status==1)
                                 <span class="label label-success w-300">Online</span>
                                 @else
                                 <span class="label label-danger w-300">Offline</span>
                                 @endif
                              </td>
                              <td class="text-center " >
                                 <button  class="edit btn btn-sm btn-info info" data-id="{{$product->id}}"><i class="fa fa-eye"></i> Chi tiết</button>
                                 <button href="javascript:void(0)" class="edit btn btn-sm btn-warning update" data-id="{{$product->id}}"><i class="fa fa-pencil"></i> Sửa</button>
                                  <form style="display: inline-block;" action="{{route('product.destroy',['id'=>$product->id])}}" method="post">
                                       {{csrf_field()}}
                                       {{method_field('DELETE')}}
                                        <button type="submit" title="Xóa" onclick="return confirm('Xóa sản phẩm này ?'); " class="delete btn btn-sm btn-danger"><i class="fa fa-times-circle"></i> Xóa</button></form>
                              </td>
                           </tr>
                           @endforeach
                            @endisset
                        </tbody>
                     </table>
                      {{ $products->links('vendor.pagination.bootstrap-4') }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modal-excel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm sản phẩm</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="modal-update">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Cập nhật sản phẩm</h4>
         </div>
         <div class="result" >

         </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modal-detail">
   <div class="modal-dialog modal-full">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Chi tiết sản phẩm</h4>
         </div>
         <div class="modal-body">
            <div class="tab-pane" id="order_resume">

            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
         </div>
      </div>
   </div>
</div>
<div class="modal  fade" id="modal-id">
   <div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title">Thêm sản phẩm</h4>
      </div>
      <form id="form1"  method="post" action="{{ route('product.store') }}" class="form-horizontal" enctype="multipart/form-data" >
         {{csrf_field()}}
         {{-- method_field('DELETE') --}}
         <div class="modal-body">
            <div class="col-md-12">
               <div class="tabcordion">
                  <ul id="myTab" class="nav nav-tabs">
                     <li class="active"><a href="#product_general" data-toggle="tab">Chi tiết</a></li>
                     <li><a href="#product_meta" data-toggle="tab">SEO</a></li>
                     <li><a href="#product_images" data-toggle="tab" onclick="return false;">Hình ảnh</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                     <div class="tab-pane fade active in" id="product_general">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group ">
                                 <input type="hidden" name="product_id" value="">
                                 <label class="  col-sm-2  ">Tên sản phẩm <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <input type="text" class="form-control" name="product_name" value="" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Danh mục<span class="asterisk">*</span></label>
                                 <div class=" col-sm-10">
                                    <select class="form-control" title="Chọn danh mục" name="category_product" required>
                                       <option selected disabled>Chọn danh mục</option>
                                       @php
                                       category($category,0,null,0);
                                       @endphp
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Màu sắc<span class="asterisk">*</span></label>
                                 <div class=" col-sm-10">
                                    <select class="form-control" multiple title="Chọn màu" id="color" name="color[]" required>
                                       @foreach (colorlib() as $cl)
                                       <option value="{{$cl}}" style="background: {{$cl}};">{{$cl}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Kích cỡ<span class="asterisk">*</span></label>
                                 <div class=" col-sm-10">
                                    <select class="form-control" multiple title="Chọn kích cỡ" name="size[]" required>
                                       @foreach(size_lib() as $key =>$sz)
                                       <optgroup label="{{$key}}" class="{{$key}}">
                                          @foreach ($sz as $s)
                                          <option value="{{$s}}">{{$s}}</option>
                                          @endforeach
                                       </optgroup>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Số lượng <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <input type="text" class="form-control" name="amount" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Đơn giá <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <input type="text" class="form-control" placeholder=".VNĐ" name="unit_price" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Giảm giá <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <input type="text" class="form-control" placeholder=".VNĐ" name="promo_price">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Xuất xứ <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <input type="text" class="form-control" value=""  name="producer" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2   m-t-10">Status <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <div class="row">
                                       <div style="padding: 6px;">
                                          <div class="col-md-3 ">
                                             <input type="radio" id="test3" name="radio-group" value="1" checked>
                                             <label for="test3">Online</label>
                                          </div>
                                           <div class="col-md-3 ">
                                             <input type="radio" id="test4" name="radio-group"  value="0">
                                             <label for="test4">Offline</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="product_meta">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Mô tả <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <textarea rows="6" class="form-control" name="content" placeholder="Mô tả" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Meta Description <span class="asterisk">*</span>
                                 </label>
                                 <div class=" col-sm-10">
                                    <textarea rows="4" class="form-control" name="metades" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="  col-sm-2  ">Meta Keywords
                                 </label>
                                 <div class=" col-sm-10">
                                    <textarea rows="6" class="form-control" name="metakey" required></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="product_images">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="dropzone" id="my-dropzone">
                                 <div class="box" id="files1">
                                    <input type="file" name="file[]" id="file-1" class="inputfile inputfile-1"
                                       multiple />
                                    <label for="file-1">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                          <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                       </svg>
                                       <span>Chọn ảnh&hellip;</span>
                                    </label>
                                 </div>
                                 <div id="img-show-1">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="border:none;">
            <div class="form-group">
               <div class="col-md-12 m-t-10 m-b-10 align-center" >
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Thêm sản phẩm</button>
               </div>
            </div>
         </div>
      </form>
   </div>
   </div>
</div>

@endsection
@section('select')
<script src="public/source/admin/plugins/bootstrap-select/bootstrap-select.js"></script>
@endsection
@section('script-upload')
<script>
   var selDiv = "";

   document.addEventListener("DOMContentLoaded", init('#file-1',"#img-show-1"), false);
   //document.addEventListener("DOMContentLoaded", init('#file-2',"#img-show-2"), false);

   function init(id1,id2) {
   document.querySelector(id1).addEventListener('change', handleFileSelect, false);
   selDiv = document.querySelector(id2);
   }

   function handleFileSelect(e) {

   if(!e.target.files || !window.FileReader) return;

   selDiv.innerHTML = "";

       var files = e.target.files;

   var filesArr = Array.prototype.slice.call(files);
   filesArr.forEach(function(f) {
   if(!f.type.match("image.*")) {
   return;
   }

   var reader = new FileReader();
   reader.onload = function (e) {
               var html = '<div class="dz-preview dz-processing dz-error dz-complete dz-image-preview"><div class="dz-image"><img data-dz-thumbnail="" alt="'+f.name+'" src="'+e.target.result+'"></div><div class="dz-details"><div class="dz-size"><span data-dz-size=""><strong>'+f.size+'</strong> bytes</span></div><div class="dz-filename"><span data-dz-name="">'+f.name+'</span></div></div></div></div>';

   selDiv.innerHTML += html;
   }
   reader.readAsDataURL(f);

   });


   }
</script>
<script>
   ( function ( document, window, index )
       {
           var inputs = document.querySelectorAll( '.inputfile' );

           Array.prototype.forEach.call( inputs, function( input )
           {
               var label     = input.nextElementSibling,
                   labelVal = label.innerHTML;

               input.addEventListener( 'change', function( e )
               {

                   var fileName = '';
                   if( this.files && this.files.length > 1 )
                       fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                   else
                       fileName = e.target.value.split( '\\' ).pop();

                   if( fileName )
                       label.querySelector( 'span' ).innerHTML = fileName;
                   else
                       label.innerHTML = labelVal;
               });

               // Firefox bug fix
               input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
               input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
           });
       }( document, window, 0 ));
</script>
<script type="text/javascript">
   $(function()
   {
       $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
       });

       $('.info').each(function() {
       $(this).click(function(e) {
           e.preventDefault();
          id =  $(this).attr('data-id');
          $.get("cp_admin/product/"+id, function(data) {

              $('#order_resume').html('');
              $('#order_resume').html(data);
              $('#modal-detail').modal('show');


          });
       });
   });


        $('.update').each(function() {
       $(this).click(function() {
            id =  $(this).attr('data-id');
          $.get("cp_admin/product/"+id+"/edit", function(data) {
              $('.result').html('');
              $('.result').html(data);
              $('#modal-update').modal('show');


          });
       });

      });
   });

</script>
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

</script>
@endsection