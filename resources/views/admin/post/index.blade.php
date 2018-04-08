@extends('admin.master')
@section('head')
<title>Unishop-Bài viết</title>
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
         <h3 class="pull-left"><strong>Danh sách bài viết</strong></h3>
          @if (count($errors) > 0)
            {{ "<script> alert(".$errors->first('file').")</script>"}}
          @endif
      </div>
      <div class="pull-right">
                <a href="javascript:void(0)" onclick="return confirm('Bạn muốn xóa những bài viết đã chọn ?');" class="btn btn-danger m-t-10"><i class="fa fa-times-circle p-r-10"></i>Xóa bài viết</a>
      </div>
      <div class="pull-right" style="margin-right: 5px;">
         <a data-toggle="modal" href='{{ route('post.create') }}' class="btn btn-success m-t-10"><i class="fa fa-plus p-r-10"></i>Thêm mới</a>
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
                            <select class="form-control" title="Chọn danh mục" name="category_pt" required>
                              <option selected disabled>Lọc danh mục</option>
                               @foreach ($categorypost as $cp)
                                  <option value="{{$cp->id}}">{{$cp->name}}</option>
                               @endforeach
                           </select>
                         </div>
                         <div class="col-md-2">
                           <div id="posts-table_filter" class="dataTables_filter"><label><input type="search" class="form-control" aria-controls="posts-table" placeholder="Tìm kiếm bài viết..."></label>
                           </div>
                        </div>
                        </div>
                    </div>

                     <table id="pts-table" class="table table-tools table-hover ">
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
                              <th><strong>Tiêu đề</strong>
                              </th>
                              <th class="text-center"><strong>Danh mục</strong>
                              </th>
                              </th>
                              <th><strong>Ngày thêm</strong>
                              </th>
                              <th style="width:10%;text-align:center"><strong>Auther</strong>
                              </th>
                              <th class="text-center"><strong>Trạng thái</strong>
                              </th>
                              <th class="text-center"><strong>Thao tác</strong>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           @isset ($post)
                           @foreach ($post as $pt)
                           <tr>
                              <td>
                                  <div class="checkbox" style="min-height: 0px;padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
                                    <label>
                                     <input type="checkbox" value="{{$pt->id}}">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    </label>
                                 </div>
                              </td>
                              <td>{{$pt->id}}</td>
                              <td style="width: 30%">{{$pt->title}}</td>
                              <td>{{category_name_post($pt->category_post)}}</td>
                              <td>{{$pt->created}}</td>
                              <td class="color-success" style="text-align: center;">
                                 {{$pt->auther}}
                              </td>
                              <td class="text-center">
                                 @if($pt->status==1)
                                 <span class="label label-success w-300">public</span>
                                 @else
                                 <span class="label label-danger w-300">private</span>
                                 @endif
                              </td>
                              <td class="text-center " >
                                 <button  class="edit btn btn-sm btn-info info" data-id="{{$pt->id}}"><i class="fa fa-eye"></i> Chi tiết</button>
                                  <form style="display: inline-block;" action="{{-- {{route('post.destroy',['id'=>$pt->id])}} --}}" method="post">
                                       {{csrf_field()}}
                                       {{method_field('DELETE')}}
                                        <button type="submit" title="Xóa" onclick="return confirm('Xóa bài viết này ?'); " class="delete btn btn-sm btn-danger"><i class="fa fa-times-circle"></i> Xóa</button></form>
                              </td>
                           </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                      {{ $post->links('vendor.pagination.bootstrap-4') }}
                       @endisset
                  </div>
               </div>
            </div>
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

</script>
@endsection