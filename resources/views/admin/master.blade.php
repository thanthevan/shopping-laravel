<!DOCTYPE html>
<html class="no-js sidebar-large">
<head>
   @include('admin.header')
    <link rel="icon" href="public/source/page/img/favicon.png">
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
 
<body >
    <!-- BEGIN TOP MENU -->
     @include('admin.modules.top_bar')
    <!-- END TOP MENU -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        @include('admin.modules.left_menu')
        <!-- END MAIN SIDEBAR -->
         
        <!-- BEGIN MAIN CONTENT -->
         @yield('content')
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END WRAPPER -->

   
    <!-- BEGIN MANDATORY SCRIPTS -->
    @include('admin.script')
    @yield('script-upload')
    <div class="modal fade" id="info-update">
            <div class="modal-dialog">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Chi tiết</h4>
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
        <script>
             $(function() {




        @if( count($errors) > 0 || session('err') || (count($errors) > 0 && session('err') ))
                  $('#modal-id').modal('show');                   
        @endif


    

        


    });
        </script>
</body>

</html>