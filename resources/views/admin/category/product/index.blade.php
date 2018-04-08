@extends('admin.master')
@section('head')
 <title>Unishop-Danh mục Sản phẩm</title>
 <meta content="" name="description" />
@endsection
@section('content')
<div id="main-content">

            <div class="m-b-20 clearfix">
                <div class="page-title pull-left">
                    <h3 class="pull-left"><strong>Danh mục sản phẩm</strong></h3>
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
									<table  class="table table-tools table-hover">
										<thead>
											<tr>
												<th style="min-width:70px"><strong>ID</strong>
												<th>Tên danh mục</th>
												<th>Hoạt động</th>
											</tr>
										</thead>
										<tbody>
											@php
	 										listcate($category);	
											@endphp
										</tbody>
									</table>
	                            </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>	
        			<div class="modal fade" id="modal-id">

        				<div class="modal-dialog">
        					<div class="modal-content">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        							<h4 class="modal-title">Thêm danh mục</h4>
        						</div>
        						<div class="modal-body">
        							  <form id="form1" class="form-horizontal"  method="post" action="{{route('category.store')}}">
        							  	{{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tên danh mục<span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="category_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Danh mục cha <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" required name="parent_id">
                                                	<option value="-1" disabled selected>Chọn danh mục cha</option>
                                                	<option value="0">ROOT</option>
                                                    @php
                                                    	categoryadd($category,0,null,0);
                                                    @endphp
                                                </select>
                                              

                                            </div>                                           
                                        </div>
                                   
        						</div>
        						<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        							<button type="submit" class="btn btn-success ">Thêm mới</button>
        						</div>
        						 </form>
        					</div>
        				</div>
        			</div>
        		
        			<div class="modal fade" id="modal-edit">

        				<div class="modal-dialog">
        					<div class="modal-content">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        							<h4 class="modal-title">Sửa danh mục</h4>
        						</div>
        						<div class="modal-body">
        							  <form id="form2" class="form-horizontal" method="post" action="">
        							  	{{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tên danh mục<span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" id="category_name" name="category_name" class="form-control" required value="">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Danh mục cha <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="category" name="parent_id">
                                                   
                                                </select>
                                               

                                            </div>                                           
                                        </div>
                                   
        						</div>
        						<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        							<button type="submit" class="btn  btn-success ">Cập nhật</button>
        						</div>
        						 </form>
        					</div>
        				</div>
        			</div>	

        				
             
@endsection