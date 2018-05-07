@extends('admin.master')
@section('head')
<title>Unishop-Nhân viên</title>
<meta content="" name="description" />
<style>
.result{
    width: 52%;
    margin-top: 38px;
    margin-left: 15px;
    position: relative;
     z-index: 998;

}
    .result-ul{
        width: 100%;
         display: block;
         position: absolute;
         
    }
    .result-ul td{
       background-color: white;
    
    }
</style>
@endsection
@section('content')
<div id="main-content">
    
             <div class="m-b-20 clearfix">
      <div class="page-title pull-left">
         <h3 class="pull-left"><strong>Danh sách nhân viên</strong></h3>
      </div>
      <div class="pull-right" style="margin-right: 5px;">
         <a data-toggle="modal" href='#modal-employee' class="btn btn-success m-t-10"><i class="fa fa-plus p-r-10"></i>Thêm mới</a>
      </div>

   </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" id="employee-finder" class="form-control" placeholder="Tìm kiếm theo tên, email, số điện thoại...">
                                   
                                </div>
                                 <div class="result" data="{{ route('filter') }}">
                                        
                                    </div>

                                
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @isset ($users)
                                @foreach ($users as $user)
                                 <div class="col-md-4 member-entry">
                                    <div class="row member">
           
                                        <div class="col-xs-12">
                                            <h3 class="m-t-0 member-name"><strong>{{$user->name}}</strong></h3>
                                            <div class="pull-left">

                                                <p><i class="fa fa-envelope-o c-gray-light p-r-10"></i> {{$user->email}}</p>
                                                <p><i class="fa fa-phone c-gray-light p-r-10"></i> {{$user->phone}}</p>
                                            </div>
                    
                                          <div class="pull-right align-right">

                                                <p><i class="fa fa-calendar c-gray-light p-r-10"></i> {{$user->namerole($user->role_id)}}</p>
                                                
                                            </div>
                                        </div>
                                        <div class="pull-right align-right">
                                             
                                                @if ($user->access($user->role_id)!=1)
                                                    
                                                 <button class="btn btn-sm btn-warning edit-employee" data-id="{{$user->id}}">Sửa</button>
                                                <form style="display: inline-block;" action="{{ route('deleteemployee',['id'=>$user->id]) }}" method="get">
                                                   
                                                    <button onclick="return confirm('Bạn có thực sự muốn xóa thành viên');" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
                                                 @endif
                                       </div> 
                                    </div>
                                </div> 
                                @endforeach
                                  
                                @endisset
                                
                            </div>
                            <div class="m-t-30 align-center">
                              @isset ($users)
                                   {{$users->links('vendor.pagination.bootstrap-4')}}
                              @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-employee">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Thêm nhân viên</h4>
                    </div>
                  <form id="form2" class="form-horizontal" method="post" action="{{ route('addemployee') }}">
                     <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                    <div class="modal-body">
                        
                             <div class="form-group">
                                    <label class="col-sm-3 control-label">Tên nhân viên<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text"  name="name" class="form-control" required value="">
                                    </div>
                            </div>
                            <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Email<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="email"  name="email" class="form-control" required value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Số điện thoại<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text"  name="phone" class="form-control" required value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Quyền<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <select class="form-control" title="Chọn quyền" name="role" required>
                                      <option selected disabled>Lọc danh mục</option>
                                         @foreach ($roles as $r)
                                             <option value="{{$r->id}}">{{$r->name}}</option>
                                         @endforeach
                                      </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Mật khẩu<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="password"  name="password" class="form-control" required value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Nhập lại<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="password"  name="repassword" class="form-control" required value="">
                                    </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="modal fade" id="employee-update">
            <div class="modal-dialog">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Sửa nhân viên</h4>
                    </div>
                    <div class="update-employee">
                         
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Lỗi</h4>
                    </div>
                    <div class="modal-body">
                        @if( count($errors) > 0 )
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('email')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('phone')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('role')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('name')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{ session('err') }}</span>
                        @elseif(session('err') )
                        <span style="color: #a94442;margin-left: 100px;">{{ session('err') }}</span>
                        @else
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('email')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('phone')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('role')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{$errors->first('name')}}</span>
                          <span style="color: #a94442;margin-left: 100px;">{{session('err')}}</span>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
@endsection
@section('select')
<script type="text/javascript">
    $(function() {




        @if( count($errors) > 0 || session('err') || (count($errors) > 0 && session('err') ))
                  $('#modal-id').modal('show');                   
        @endif


    

        


    });
</script>

@endsection