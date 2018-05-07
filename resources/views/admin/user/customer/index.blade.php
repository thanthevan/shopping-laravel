@extends('admin.master')
@section('head')
<title>Unishop-Khách hàng thành viên</title>
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
         <h3 class="pull-left"><strong>Danh sách khách hàng thành viên</strong></h3>
      </div>


   </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" id="member-finder" class="form-control" placeholder="Tìm kiếm theo tên, email, số điện thoại...">
                                   
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

                                                <p><i class="fa fa-calendar c-gray-light p-r-10"></i> {{$user->birthday}}</p>
                                                <p><i class="fa fa-map-marker c-gray-light p-r-10"></i> {{$user->address}}</p>
                                            </div>
                    

                                        </div>
                                        <div class="pull-right align-right">
                                                <form style="display: inline-block;" action="{{ route('user.destroy',['id'=>$user->id]) }}" method="post">
                                                      <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button onclick="return confirm('Bạn có thực sự muốn xóa thành viên');" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
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


@endsection
@section('select')

@endsection